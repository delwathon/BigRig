<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Subscription;
use App\Models\EnrolmentBatches;
use App\Services\InstructorAssignmentService;
use App\Models\StudentInstructorDistribution;
use Unicodeveloper\Paystack\Facades\Paystack;

class CheckoutController extends Controller
{
    public function assignInstructorToStudent($student_id, $course_id)
    {
        $service = new InstructorAssignmentService();
        $instructor_roles = $service->getEligibleInstructorRoles((int) $course_id);
        
        return $this->assignStudentToInstructor($student_id, $instructor_roles, $course_id);
    }

    private function assignStudentToInstructor($student_id, $instructor_roles, $course_id)
    {
        if (empty($instructor_roles)) {
            return false; // No instructors available
        }

        foreach ((array) $instructor_roles as $instructor_role) {
            $instructors = User::where('role_id', $instructor_role)
                ->leftJoin('student_instructor_distributions', 'users.id', '=', 'student_instructor_distributions.instructor_id')
                ->select('users.id', DB::raw('COUNT(student_instructor_distributions.student_id) as student_count'))
                ->groupBy('users.id')
                ->orderBy('student_count', 'asc')
                ->get();

            if ($instructors->isEmpty()) {
                return false;
            }

            $selected_instructor = $instructors->first();
            $batch = EnrolmentBatches::where('active_batch', true)->first();

            StudentInstructorDistribution::create([
                'enrolment_batch_id' => $batch->id,
                'student_id' => $student_id,
                'instructor_id' => $selected_instructor->id,
                'course_id' => $course_id,
            ]);
        }
    }

    public function index()
    {
        $subscription = Subscription::where('user_id', Auth::id())->latest()->first();
        $exchange_rate = 1750;
        $objectives = $subscription ? $subscription->objectives : [];

        if ($subscription && $subscription->payment_status === 'completed') {
            return redirect('/dashboard');
        }

        return view('checkout.pay', compact('subscription', 'objectives', 'exchange_rate'));
    }

    public function redirectToPaystack(Request $request)
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->latest()->first();
        $exchange_rate = 1750;
        $amount = ($subscription->total_amount * $exchange_rate) * 100;

        $data = [
            'email' => $user->email,
            'amount' => $amount,
            'callback_url' => route('payment.callback'),
            'reference' => Paystack::genTranxRef(),
            'metadata' => [
                'user_id' => $user->id,
                'subscription_id' => $subscription->id,
            ],
        ];

        try {
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            return back()->with('error', 'Payment initialization failed. Please try again.');
        }
    }

    public function handleGatewayCallback(Request $request)
    {
        try {
            $paymentDetails = Paystack::getPaymentData();
            $user = Auth::user();
            $subscription = Subscription::where('user_id', $user->id)->latest()->first();

            if (!$subscription) {
                return redirect('/payment/failed')->with('error', 'Subscription not found.');
            }

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
        } catch (\Exception $e) {
            if (isset($subscription) && $subscription->payment_reference === null) {
                $subscription->update([
                    'payment_status' => 'failed',
                    'payment_reference' => $paymentDetails['data']['reference'] ?? null,
                    'payment_method' => 'Paystack',
                ]);
            } else {
                Subscription::create([
                    'user_id' => $user->id,
                    'payment_reference' => $paymentDetails['data']['reference'],
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

    private function assignCoursesToStudent($user, $course_ids)
    {
        if (!$course_ids) {
            return;
        }

        $course_ids = is_array($course_ids) ? $course_ids : json_decode($course_ids, true);
        $course_ids = array_column($course_ids, 'id');

        foreach ($course_ids as $course_id) {
            $this->assignInstructorToStudent($user->id, (int) $course_id);
        }
    }
}
