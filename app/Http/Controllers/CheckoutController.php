<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Subscription;
use App\Models\EnrolmentBatch;
use App\Models\PaymentGatewayConfig;
use App\Models\StudentInstructorDistribution;
use App\Models\TrainingObjective;
use App\Models\RoleCourse;
use App\Services\InstructorAssignmentService;
use GuzzleHttp\Client;

class CheckoutController extends Controller
{
    /**
     * Define roles that should NOT be assigned to students
     */
    private const EXCLUDED_ROLES = [
        1,  // SuperAdmin
        2,  // IT Consultant
        3,  // Admin
        4,  // Lead Instructor
        10  // Student
    ];

    /**
     * Define roles that CAN teach students
     */
    private const INSTRUCTOR_ROLES = [
        5,  // MV Instructor
        6,  // CMV Instructor
        7,  // Forklift Instructor
        8,  // Defensive Driving Instructor
        9,  // Safety & Compliance Instructor
    ];

    /**
     * Assign an instructor to a student based on the course ID.
     */
    public function assignInstructorToStudent($studentId, $courseId)
    {
        try {
            Log::info("=== Starting instructor assignment ===");
            Log::info("Student ID: {$studentId}, Course ID: {$courseId}");

            // Check if course exists
            $course = TrainingObjective::find($courseId);
            if (!$course) {
                Log::error("Course not found: {$courseId}");
                return false;
            }
            Log::info("Course found: {$course->objective}");

            // Get eligible instructor roles for this course, excluding admin roles
            $instructorRoles = RoleCourse::where('course_id', $courseId)
                ->whereNotIn('role_id', self::EXCLUDED_ROLES)  // Exclude admin/management roles
                ->pluck('role_id')
                ->toArray();

            Log::info("Eligible instructor role IDs for course {$courseId} (excluding admin roles): " . json_encode($instructorRoles));

            if (empty($instructorRoles)) {
                Log::warning("No eligible instructor roles found for course ID: {$courseId}");
                // Try fallback method with teaching instructors only
                return $this->assignTeachingInstructor($studentId, $courseId);
            }

            return $this->assignStudentToInstructor($studentId, $instructorRoles, $courseId);

        } catch (\Exception $e) {
            Log::error("Error in assignInstructorToStudent: " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
            return false;
        }
    }

    /**
     * Logic to assign student to the least-loaded instructor from the eligible roles.
     */
    private function assignStudentToInstructor($studentId, $instructorRoles, $courseId)
    {
        try {
            Log::info("Checking if student {$studentId} is already assigned to course {$courseId}");

            // Check if already assigned
            $alreadyAssigned = StudentInstructorDistribution::where('student_id', $studentId)
                ->where('course_id', $courseId)
                ->first();

            if ($alreadyAssigned) {
                Log::info("Student {$studentId} already assigned to course {$courseId} with instructor {$alreadyAssigned->instructor_id}");
                return true;
            }

            // Get student details
            $student = User::find($studentId);
            if (!$student) {
                Log::error("Student not found: {$studentId}");
                return false;
            }

            Log::info("Student found: {$student->firstName} {$student->lastName}");

            // Ensure student has a batch
            $batchId = $this->ensureStudentHasBatch($student);
            if (!$batchId) {
                Log::error("Failed to get/create batch for student {$studentId}");
                return false;
            }

            Log::info("Using batch ID: {$batchId}");

            // Find the best instructor (excluding admin roles)
            $instructor = $this->findBestInstructor($instructorRoles, $courseId);

            if (!$instructor) {
                Log::warning("No instructor found with roles: " . json_encode($instructorRoles));
                return $this->assignTeachingInstructor($studentId, $courseId);
            }

            Log::info("Selected instructor: {$instructor->id} - {$instructor->firstName} {$instructor->lastName}");

            // Create the assignment
            $assignment = StudentInstructorDistribution::create([
                'enrolment_batch_id' => $batchId,
                'student_id' => $studentId,
                'instructor_id' => $instructor->id,
                'course_id' => $courseId,
            ]);

            Log::info("✅ Successfully created assignment with ID: {$assignment->id}");
            Log::info("Assignment details: " . json_encode($assignment->toArray()));

            return true;

        } catch (\Exception $e) {
            Log::error("Error in assignStudentToInstructor: " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
            return false;
        }
    }

    /**
     * Ensure student has a batch
     */
    private function ensureStudentHasBatch($student)
    {
        if ($student->enrolment_batch_id) {
            return $student->enrolment_batch_id;
        }

        // Find or create active batch
        $activeBatch = EnrolmentBatch::where('active_batch', true)->first();

        if (!$activeBatch) {
            $activeBatch = EnrolmentBatch::create([
                'batch_name' => 'Batch ' . date('Y-m'),
                'active_batch' => true,
            ]);
            Log::info("Created new batch: {$activeBatch->id}");
        }

        // Update student's batch
        $student->update(['enrolment_batch_id' => $activeBatch->id]);
        Log::info("Updated student {$student->id} with batch {$activeBatch->id}");

        return $activeBatch->id;
    }

    /**
     * Find the best instructor for a course (excluding admin roles)
     */
    private function findBestInstructor($instructorRoles, $courseId)
    {
        // Get all instructors with the eligible roles, excluding admin roles
        $instructorsQuery = User::whereHas('roles', function($query) use ($instructorRoles) {
            $query->whereIn('roles.id', $instructorRoles)
                  ->whereNotIn('roles.id', self::EXCLUDED_ROLES); // Double-check exclusion
        })
        ->where('user_active', 1)
        // Additional check to ensure no admin roles
        ->whereDoesntHave('roles', function($query) {
            $query->whereIn('roles.id', self::EXCLUDED_ROLES);
        });

        $allInstructors = $instructorsQuery->get();
        Log::info("Found " . $allInstructors->count() . " teaching instructors with eligible roles");

        if ($allInstructors->isEmpty()) {
            return null;
        }

        // Log each instructor found
        foreach ($allInstructors as $inst) {
            $roles = $inst->roles->pluck('role_name')->join(', ');
            Log::info("Available instructor: {$inst->id} - {$inst->firstName} {$inst->lastName} (Roles: {$roles})");
        }

        // Find instructor with least students for this course
        $instructorLoads = [];
        foreach ($allInstructors as $instructor) {
            $studentCount = StudentInstructorDistribution::where('instructor_id', $instructor->id)
                ->where('course_id', $courseId)
                ->count();

            $instructorLoads[] = [
                'instructor' => $instructor,
                'count' => $studentCount
            ];

            Log::info("Instructor {$instructor->id} ({$instructor->firstName} {$instructor->lastName}) has {$studentCount} students for course {$courseId}");
        }

        // Sort by student count and return the one with least students
        usort($instructorLoads, function($a, $b) {
            return $a['count'] <=> $b['count'];
        });

        return $instructorLoads[0]['instructor'];
    }

    /**
     * Fallback: Assign any teaching instructor (not admin roles)
     */
    private function assignTeachingInstructor($studentId, $courseId)
    {
        try {
            Log::info("Attempting fallback: assign any teaching instructor (excluding admin roles)");

            $student = User::find($studentId);
            if (!$student) {
                return false;
            }

            $batchId = $this->ensureStudentHasBatch($student);

            // Find any teaching instructor (roles 5-9 only)
            $instructor = User::whereHas('roles', function($query) {
                $query->whereIn('roles.id', self::INSTRUCTOR_ROLES);
            })
            ->whereDoesntHave('roles', function($query) {
                $query->whereIn('roles.id', self::EXCLUDED_ROLES);
            })
            ->where('user_active', 1)
            ->withCount(['instructorDistributions as total_students' => function($query) {
                $query->select(DB::raw('count(distinct student_id)'));
            }])
            ->orderBy('total_students', 'asc')
            ->first();

            if (!$instructor) {
                Log::error("No teaching instructors available at all!");
                Log::error("This means no users with roles 5-9 exist in the system");
                return false;
            }

            $roles = $instructor->roles->pluck('role_name')->join(', ');
            Log::info("Fallback: Using instructor {$instructor->id} - {$instructor->firstName} {$instructor->lastName} (Roles: {$roles})");

            StudentInstructorDistribution::create([
                'enrolment_batch_id' => $batchId,
                'student_id' => $studentId,
                'instructor_id' => $instructor->id,
                'course_id' => $courseId,
            ]);

            Log::info("✅ Fallback assignment successful");
            return true;

        } catch (\Exception $e) {
            Log::error("Error in fallback assignment: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Assigns a list of courses to a student based on the course IDs.
     */
    private function assignCoursesToStudent($user, $courseObjectives)
    {
        try {
            Log::info("=== Starting course assignment for student {$user->id} ===");
            Log::info("Raw objectives type: " . gettype($courseObjectives));

            if (!$courseObjectives) {
                Log::warning("No course objectives provided");
                return;
            }

            $courseIds = [];

            // Handle Subscription model's getObjectivesAttribute which returns TrainingObjective collection
            if ($courseObjectives instanceof \Illuminate\Database\Eloquent\Collection) {
                Log::info("Objectives is an Eloquent Collection");
                $courseIds = $courseObjectives->pluck('id')->toArray();
            }
            // Handle if it's already an array of objects
            elseif (is_array($courseObjectives)) {
                Log::info("Objectives is an array");
                foreach ($courseObjectives as $item) {
                    if (is_object($item) && isset($item->id)) {
                        $courseIds[] = $item->id;
                    } elseif (is_array($item) && isset($item['id'])) {
                        $courseIds[] = $item['id'];
                    } elseif (is_numeric($item)) {
                        $courseIds[] = $item;
                    }
                }
            }
            // Handle JSON string
            elseif (is_string($courseObjectives)) {
                Log::info("Objectives is a string, attempting to decode");
                $decoded = json_decode($courseObjectives, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    $courseIds = array_filter($decoded, 'is_numeric');
                }
            }

            $courseIds = array_unique(array_filter($courseIds));
            Log::info("Extracted course IDs: " . json_encode($courseIds));

            if (empty($courseIds)) {
                Log::error("No valid course IDs extracted from objectives");
                return;
            }

            $successCount = 0;
            $failCount = 0;

            foreach ($courseIds as $courseId) {
                Log::info("Processing course ID: {$courseId}");

                if ($this->assignInstructorToStudent($user->id, (int) $courseId)) {
                    $successCount++;
                    Log::info("✅ Successfully assigned instructor for course {$courseId}");
                } else {
                    $failCount++;
                    Log::error("❌ Failed to assign instructor for course {$courseId}");
                }
            }

            Log::info("=== Course assignment completed ===");
            Log::info("Success: {$successCount}, Failed: {$failCount}");

        } catch (\Exception $e) {
            Log::error("Critical error in assignCoursesToStudent: " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
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

                        // Log the objectives for debugging
                        Log::info("Processing courses for student {$user->id}. Objectives: " . json_encode($subscription->objectives));

                        $this->assignCoursesToStudent($user, $subscription->objectives);
                    }
                    // Handle retry for failed payment
                    elseif ($subscription->payment_status === 'failed') {
                        $objectives = is_string($subscription->objectives)
                            ? $subscription->objectives
                            : json_encode(collect($subscription->objectives)->pluck('id')->toArray());

                        $newSubscription = Subscription::create([
                            'user_id' => $user->id,
                            'payment_reference' => $paymentDetails['data']['reference'],
                            'objectives' => $objectives,
                            'subtotal' => $subscription->subtotal,
                            'tax' => $subscription->tax,
                            'total_amount' => $subscription->total_amount,
                            'payment_status' => 'completed',
                            'payment_method' => 'Paystack',
                        ]);

                        $user->update(['user_active' => true]);

                        Log::info("Processing courses for student {$user->id} (retry). Objectives: " . json_encode($newSubscription->objectives));

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
                    Log::error('Error processing successful payment: ' . $e->getMessage() . "\n" . $e->getTraceAsString());

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
}
