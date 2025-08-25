<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;
use App\Models\Subscription;
use App\Models\EnrolmentBatches;
use App\Models\PaymentGatewayConfig;
use App\Models\StudentInstructorDistribution;
use App\Services\InstructorAssignmentService;
use GuzzleHttp\Client;

class CheckoutController extends Controller
{
    /**
     * Assign an instructor to a student based on the course ID.
     */
    public function assignInstructorToStudent($studentId, $courseId)
    {
        $service = new InstructorAssignmentService();
        $instructorRoles = $service->getEligibleInstructorRoles((int) $courseId);

        return $this->assignStudentToInstructor($studentId, $instructorRoles, $courseId);
    }

    /**
     * Logic to assign student to the least-loaded instructor from the eligible roles.
     */
    private function assignStudentToInstructor($studentId, $instructorRoles, $courseId)
    {
        if (empty($instructorRoles)) {
            return false;
        }

        $alreadyAssigned = StudentInstructorDistribution::where([
            'student_id' => $studentId,
            'course_id' => $courseId,
        ])->exists();

        if ($alreadyAssigned) {
            return;
        }

        foreach ((array) $instructorRoles as $roleId) {
            $instructors = User::whereHas('roles', fn($q) => $q->where('roles.id', $roleId))
                ->leftJoin('student_instructor_distributions', 'users.id', '=', 'student_instructor_distributions.instructor_id')
                ->select('users.id', DB::raw('COUNT(student_instructor_distributions.student_id) as student_count'))
                ->groupBy('users.id')
                ->orderBy('student_count', 'asc')
                ->get();

            if ($instructors->isEmpty()) {
                continue;
            }

            $selectedInstructor = $instructors->first();
            $activeBatch = EnrolmentBatches::where('active_batch', true)->first();

            StudentInstructorDistribution::create([
                'enrolment_batch_id' => $activeBatch->id,
                'student_id' => $studentId,
                'instructor_id' => $selectedInstructor->id,
                'course_id' => $courseId,
            ]);

            return;
        }
    }

    /**
     * Display the payment view for the authenticated user's subscription.
     */
    public function index()
    {
        $subscription = Subscription::where('user_id', Auth::id())->latest()->first();
        $exchangeRate = 1750;
        $objectives = $subscription?->objectives ?? [];

        if ($subscription && $subscription->payment_status === 'completed') {
            return redirect('/dashboard');
        }

        return view('checkout.pay', compact('subscription', 'objectives', 'exchangeRate'));
    }

    /**
     * Initiates a Paystack payment and redirects to the authorization URL.
     */
    public function redirectToPaystack(Request $request)
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->latest()->first();
        $amount = $subscription->total_amount * 100;

        $paystackSettings = PaymentGatewayConfig::where('name', 'Paystack')->first();
        if (!$paystackSettings) {
            return back()->with('error', 'Paystack configuration not found.');
        }

        config([
            'paystack.publicKey' => $paystackSettings->public_key,
            'paystack.secretKey' => Crypt::decryptString($paystackSettings->secret_key),
            'paystack.paymentUrl' => 'https://api.paystack.co',
            'paystack.merchantEmail' => $paystackSettings->merchant_email,
        ]);

        $data = [
            'email' => $user->email,
            'amount' => $amount,
            'callback_url' => route('payment.callback'),
            'reference' => app(\Unicodeveloper\Paystack\Paystack::class)->genTranxRef(),
            'metadata' => [
                'user_id' => $user->id,
                'subscription_id' => $subscription->id,
            ],
        ];

        try {
            return app(\Unicodeveloper\Paystack\Paystack::class)->getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            return back()->with('error', 'Payment initialization failed. Please try again.');
        }
    }

    /**
     * Handles the callback from Paystack and verifies the transaction.
     */
    public function handleGatewayCallback(Request $request)
    {
        $reference = $request->query('reference');
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->latest()->first();

        $paystackSettings = PaymentGatewayConfig::where('name', 'Paystack')->first();
        if (!$paystackSettings) {
            return redirect('/payment/failed')->with('error', 'Paystack settings not found.');
        }

        $secretKey = Crypt::decryptString($paystackSettings->secret_key);

        try {
            $client = new Client();
            $response = $client->get("https://api.paystack.co/transaction/verify/{$reference}", [
                'headers' => [
                    'Authorization' => "Bearer {$secretKey}",
                    'Accept' => 'application/json',
                ],
            ]);

            $paymentDetails = json_decode($response->getBody(), true);

            if ($paymentDetails['status'] && $paymentDetails['data']['status'] === 'success') {
                if ($subscription->payment_status === 'pending') {
                    $subscription->update([
                        'payment_status' => 'completed',
                        'payment_reference' => $paymentDetails['data']['reference'],
                        'payment_method' => 'Paystack',
                    ]);

                    $user->update(['user_active' => true]);
                    $this->assignCoursesToStudent($user, $subscription->objectives);
                }

                if ($subscription->payment_status === 'failed') {
                    $newSubscription = Subscription::create([
                        'user_id' => $user->id,
                        'payment_reference' => $paymentDetails['data']['reference'],
                        'objectives' => json_encode(collect($subscription->objectives)->pluck('id')->toArray()),
                        'subtotal' => $subscription->subtotal,
                        'tax' => $subscription->tax,
                        'total_amount' => $subscription->total_amount,
                        'payment_status' => 'completed',
                        'payment_method' => 'Paystack',
                    ]);

                    $user->update(['user_active' => true]);
                    $this->assignCoursesToStudent($user, $newSubscription->objectives);
                }

                return redirect('/email/verify')->with('success', 'Payment successful! Please verify your email.');
            }

            throw new \Exception('Payment not successful.');
        } catch (\Exception $e) {
            if (isset($subscription) && $subscription->payment_reference === null) {
                $subscription->update([
                    'payment_status' => 'failed',
                    'payment_reference' => $reference,
                    'payment_method' => 'Paystack',
                ]);
            } else {
                Subscription::create([
                    'user_id' => $user->id,
                    'payment_reference' => $reference,
                    'objectives' => json_encode(collect($subscription->objectives)->pluck('id')->toArray()),
                    'subtotal' => $subscription->subtotal,
                    'tax' => $subscription->tax,
                    'total_amount' => $subscription->total_amount,
                    'payment_status' => 'failed',
                    'payment_method' => 'Paystack',
                ]);
            }

            $user->update(['user_active' => false]);
            return redirect('/payment/failed')->with('error', 'An error occurred during payment verification.');
        }
    }

    /**
     * Assigns a list of courses to a student based on the course IDs.
     */
    private function assignCoursesToStudent($user, $courseIds)
    {
        if (!$courseIds) return;

        $courseIds = is_array($courseIds) ? $courseIds : json_decode($courseIds, true);
        $courseIds = array_column($courseIds, 'id');

        foreach ($courseIds as $courseId) {
            $this->assignInstructorToStudent($user->id, (int) $courseId);
        }
    }
}
