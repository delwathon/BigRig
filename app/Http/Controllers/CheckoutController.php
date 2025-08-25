<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Subscription;
use App\Models\EnrolmentBatch; // Fixed: Should be singular
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
        try {
            $service = new InstructorAssignmentService();
            $instructorRoles = $service->getEligibleInstructorRoles((int) $courseId);

            if (empty($instructorRoles)) {
                Log::warning("No eligible instructor roles found for course ID: {$courseId}");
                return false;
            }

            return $this->assignStudentToInstructor($studentId, $instructorRoles, $courseId);
        } catch (\Exception $e) {
            Log::error("Error assigning instructor: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Logic to assign student to the least-loaded instructor from the eligible roles.
     */
    private function assignStudentToInstructor($studentId, $instructorRoles, $courseId)
    {
        try {
            // Check if already assigned
            $alreadyAssigned = StudentInstructorDistribution::where([
                'student_id' => $studentId,
                'course_id' => $courseId,
            ])->exists();

            if ($alreadyAssigned) {
                Log::info("Student {$studentId} already assigned to course {$courseId}");
                return true;
            }

            // Get student details for batch ID
            $student = User::find($studentId);
            if (!$student) {
                Log::error("Student not found: {$studentId}");
                return false;
            }

            // Find instructors with the eligible roles
            $instructor = User::whereHas('roles', function($q) use ($instructorRoles) {
                    $q->whereIn('roles.id', $instructorRoles);
                })
                ->leftJoin('student_instructor_distributions', function($join) use ($courseId) {
                    $join->on('users.id', '=', 'student_instructor_distributions.instructor_id')
                         ->where('student_instructor_distributions.course_id', '=', $courseId);
                })
                ->select('users.*', DB::raw('COUNT(student_instructor_distributions.student_id) as student_count'))
                ->groupBy('users.id')
                ->orderBy('student_count', 'asc')
                ->first();

            if (!$instructor) {
                Log::warning("No instructor available for course {$courseId}");
                return false;
            }

            // Get active batch or student's batch
            $batchId = $student->enrolment_batch_id;
            if (!$batchId) {
                $activeBatch = EnrolmentBatch::where('active_batch', true)->first();
                $batchId = $activeBatch ? $activeBatch->id : null;
            }

            if (!$batchId) {
                Log::error("No batch found for student {$studentId}");
                return false;
            }

            // Create the assignment
            StudentInstructorDistribution::create([
                'enrolment_batch_id' => $batchId,
                'student_id' => $studentId,
                'instructor_id' => $instructor->id,
                'course_id' => $courseId,
            ]);

            Log::info("Successfully assigned instructor {$instructor->id} to student {$studentId} for course {$courseId}");
            return true;

        } catch (\Exception $e) {
            Log::error("Error in assignStudentToInstructor: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Display the payment view for the authenticated user's subscription.
     */
    public function index()
    {
        $subscription = Subscription::where('user_id', Auth::id())->latest()->first();
        $exchangeRate = 1535;
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
        try {
            $user = Auth::user();
            $subscription = Subscription::where('user_id', $user->id)->latest()->first();

            if (!$subscription) {
                return back()->with('error', 'No subscription found.');
            }

            $amount = $subscription->total_amount * 100; // Convert to kobo

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

            return app(\Unicodeveloper\Paystack\Paystack::class)->getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            Log::error('Paystack initialization error: ' . $e->getMessage());
            return back()->with('error', 'Payment initialization failed. Please try again.');
        }
    }

    /**
     * Handles the callback from Paystack and verifies the transaction.
     */
    public function handleGatewayCallback(Request $request)
    {
        $reference = $request->query('reference');

        if (!$reference) {
            return redirect('/dashboard')->with('error', 'No payment reference provided.');
        }

        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->id)->latest()->first();

        if (!$subscription) {
            return redirect('/dashboard')->with('error', 'Subscription not found.');
        }

        $paystackSettings = PaymentGatewayConfig::where('name', 'Paystack')->first();
        if (!$paystackSettings) {
            return redirect('/dashboard')->with('error', 'Paystack settings not found.');
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
                DB::beginTransaction();

                try {
                    // Update subscription for pending payment
                    if ($subscription->payment_status === 'pending') {
                        $subscription->update([
                            'payment_status' => 'completed',
                            'payment_reference' => $paymentDetails['data']['reference'],
                            'payment_method' => 'Paystack',
                        ]);

                        $user->update(['user_active' => true]);
                        $this->assignCoursesToStudent($user, $subscription->objectives);
                    }
                    // Handle retry for failed payment
                    elseif ($subscription->payment_status === 'failed') {
                        $newSubscription = Subscription::create([
                            'user_id' => $user->id,
                            'payment_reference' => $paymentDetails['data']['reference'],
                            'objectives' => is_string($subscription->objectives)
                                ? $subscription->objectives
                                : json_encode(collect($subscription->objectives)->pluck('id')->toArray()),
                            'subtotal' => $subscription->subtotal,
                            'tax' => $subscription->tax,
                            'total_amount' => $subscription->total_amount,
                            'payment_status' => 'completed',
                            'payment_method' => 'Paystack',
                        ]);

                        $user->update(['user_active' => true]);
                        $this->assignCoursesToStudent($user, $newSubscription->objectives);
                    }

                    DB::commit();

                    // Redirect based on user role
                    if ($user->hasRole('student')) {
                        return redirect()->route('student.dashboard')
                            ->with('success', 'Payment successful! You have been enrolled in your courses.');
                    }

                    // Check if email verification is needed
                    if (!$user->hasVerifiedEmail()) {
                        return redirect('/email/verify')
                            ->with('success', 'Payment successful! Please verify your email.');
                    }

                    return redirect('/dashboard')
                        ->with('success', 'Payment successful! You have been enrolled.');

                } catch (\Exception $e) {
                    DB::rollback();
                    Log::error('Error processing successful payment: ' . $e->getMessage());

                    // Payment was successful but enrollment failed - still redirect to dashboard
                    return redirect('/dashboard')
                        ->with('warning', 'Payment successful but enrollment pending. Please contact support.');
                }
            }

            throw new \Exception('Payment not successful.');

        } catch (\Exception $e) {
            Log::error('Payment verification error: ' . $e->getMessage());

            // Update subscription status to failed
            if ($subscription && $subscription->payment_reference === null) {
                $subscription->update([
                    'payment_status' => 'failed',
                    'payment_reference' => $reference,
                    'payment_method' => 'Paystack',
                ]);
            }

            $user->update(['user_active' => false]);

            return redirect('/dashboard')
                ->with('error', 'Payment verification failed. Please try again or contact support.');
        }
    }

    /**
     * Assigns a list of courses to a student based on the course IDs.
     */
    private function assignCoursesToStudent($user, $courseIds)
    {
        if (!$courseIds) {
            Log::warning("No course IDs provided for student {$user->id}");
            return;
        }

        try {
            // Handle different formats of course IDs
            if (is_string($courseIds)) {
                $courseIds = json_decode($courseIds, true);
            }

            // Extract IDs if they're objects with 'id' property
            if (!empty($courseIds) && is_array($courseIds)) {
                if (isset($courseIds[0]) && is_array($courseIds[0]) && isset($courseIds[0]['id'])) {
                    $courseIds = array_column($courseIds, 'id');
                } elseif (isset($courseIds[0]) && is_object($courseIds[0]) && isset($courseIds[0]->id)) {
                    $courseIds = array_map(function($obj) {
                        return $obj->id;
                    }, $courseIds);
                }
            }

            // Ensure we have an array of IDs
            $courseIds = array_filter((array) $courseIds);

            foreach ($courseIds as $courseId) {
                $this->assignInstructorToStudent($user->id, (int) $courseId);
            }
        } catch (\Exception $e) {
            Log::error("Error assigning courses to student {$user->id}: " . $e->getMessage());
        }
    }
}
