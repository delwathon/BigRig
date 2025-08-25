<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\StudentAttendance;
use App\Models\TrainingSchedule;
use App\Models\StudentInstructorDistribution;
use App\Models\StudentProgress;
use Carbon\Carbon;

class StudentProgressController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get student's enrolled courses
        $subscription = Subscription::where('user_id', $user->id)
            ->where('payment_status', 'completed')
            ->latest()
            ->first();

        $enrolledCourses = collect();
        if ($subscription) {
            $enrolledCourses = $subscription->objectives;
        }

        // Get progress for each course
        $coursesProgress = $enrolledCourses->map(function($course) use ($user) {
            // Get instructor assignment
            $instructorAssignment = StudentInstructorDistribution::where('student_id', $user->id)
                ->where('course_id', $course->id)
                ->with('instructor')
                ->first();

            // Get all schedules for this course
            $totalSchedules = 0;
            $completedSchedules = 0;

            if ($instructorAssignment) {
                $allSchedules = TrainingSchedule::where('instructor_id', $instructorAssignment->instructor_id)
                    ->where('course_id', $course->id)
                    ->where('batch_id', $user->enrolment_batch_id)
                    ->get();

                $totalSchedules = $allSchedules->count();
                $completedSchedules = $allSchedules->filter(function($schedule) {
                    $schedule_date = Carbon::parse($schedule->schedule_date)->format('Y-m-d');
                    return Carbon::parse($schedule_date . ' ' . $schedule->time_stop)->isPast();
                })->count();
            }

            // Get attendance for this course
            $attendance = StudentAttendance::where('student_id', $user->id)
                ->where('course_id', $course->id)
                ->selectRaw('
                    COUNT(*) as total,
                    SUM(CASE WHEN status = "present" THEN 1 ELSE 0 END) as present,
                    SUM(CASE WHEN status = "late" THEN 1 ELSE 0 END) as late
                ')
                ->first();

            $attendanceRate = $attendance->total > 0
                ? round((($attendance->present + $attendance->late) / $attendance->total) * 100)
                : 0;

            // Calculate overall progress
            $overallProgress = $totalSchedules > 0
                ? round(($completedSchedules / $totalSchedules) * 100)
                : 0;

            // Get theory and practical breakdown
            $theorySchedules = TrainingSchedule::where('instructor_id', $instructorAssignment->instructor_id ?? 0)
                ->where('course_id', $course->id)
                ->where('batch_id', $user->enrolment_batch_id)
                ->where('session_type', 'theory')
                ->get();

            $practicalSchedules = TrainingSchedule::where('instructor_id', $instructorAssignment->instructor_id ?? 0)
                ->where('course_id', $course->id)
                ->where('batch_id', $user->enrolment_batch_id)
                ->where('session_type', 'practical')
                ->get();

            $theoryCompleted = $theorySchedules->filter(function($schedule) {
                $schedule_date = Carbon::parse($schedule->schedule_date)->format('Y-m-d');
                return Carbon::parse($schedule_date . ' ' . $schedule->time_stop)->isPast();
            })->count();

            $practicalCompleted = $practicalSchedules->filter(function($schedule) {
                $schedule_date = Carbon::parse($schedule->schedule_date)->format('Y-m-d');
                return Carbon::parse($schedule_date . ' ' . $schedule->time_stop)->isPast();
            })->count();

            return [
                'course' => $course,
                'instructor' => $instructorAssignment ? $instructorAssignment->instructor : null,
                'overall_progress' => $overallProgress,
                'attendance_rate' => $attendanceRate,
                'theory_total' => $theorySchedules->count(),
                'theory_completed' => $theoryCompleted,
                'practical_total' => $practicalSchedules->count(),
                'practical_completed' => $practicalCompleted,
                'classes_completed' => $completedSchedules,
                'classes_total' => $totalSchedules,
            ];
        });

        // Calculate overall statistics
        $overallStats = [
            'total_courses' => $coursesProgress->count(),
            'average_progress' => $coursesProgress->avg('overall_progress'),
            'average_attendance' => $coursesProgress->avg('attendance_rate'),
            'total_classes' => $coursesProgress->sum('classes_total'),
            'completed_classes' => $coursesProgress->sum('classes_completed'),
        ];

        return view('student.progress', compact('coursesProgress', 'overallStats'));
    }

    public function course($courseId)
    {
        // Detailed progress for a specific course
        $user = Auth::user();

        // Verify student is enrolled
        $subscription = Subscription::where('user_id', $user->id)
            ->where('payment_status', 'completed')
            ->latest()
            ->first();

        if (!$subscription) {
            abort(404);
        }

        $enrolledCourseIds = $subscription->objectives->pluck('id')->toArray();
        if (!in_array($courseId, $enrolledCourseIds)) {
            abort(403);
        }

        // Get detailed progress data
        // ... implementation for detailed course progress

        return view('student.course-progress', compact('courseId'));
    }
}
