<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\StudentInstructorDistribution;
use App\Models\TrainingSchedule;
use App\Models\TrainingObjective;
use App\Models\CourseMaterial;
use App\Models\Curriculum;
use Carbon\Carbon;

class StudentCourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get student's active subscription
        $subscription = Subscription::where('user_id', $user->id)
            ->where('payment_status', 'completed')
            ->latest()
            ->first();

        // Get enrolled courses
        $enrolledCourses = collect();
        if ($subscription) {
            $enrolledCourses = $subscription->objectives;
        }

        // Get instructor assignments for all courses
        $instructorAssignments = StudentInstructorDistribution::where('student_id', $user->id)
            ->with(['instructor', 'course'])
            ->get()
            ->keyBy('course_id');

        // Prepare detailed course data
        $courses = $enrolledCourses->map(function($course) use ($instructorAssignments) {
            $assignment = $instructorAssignments->get($course->id);

            // Get curriculum count
            $curriculumCount = Curriculum::where('objective_id', $course->id)->count();

            // Get materials count
            $materialsCount = CourseMaterial::where('objective_id', $course->id)->count();

            return [
                'course' => $course,
                'instructor' => $assignment ? $assignment->instructor : null,
                'curriculum_count' => $curriculumCount,
                'materials_count' => $materialsCount,
                'progress' => 0, // Will be calculated when progress tracking is implemented
            ];
        });

        return view('student.courses', compact('courses', 'subscription'));
    }

    public function show($id)
    {
        $user = Auth::user();

        // Verify student is enrolled in this course
        $subscription = Subscription::where('user_id', $user->id)
            ->where('payment_status', 'completed')
            ->latest()
            ->first();

        if (!$subscription) {
            abort(404, 'Course not found');
        }

        $enrolledCourseIds = $subscription->objectives->pluck('id')->toArray();

        if (!in_array($id, $enrolledCourseIds)) {
            abort(403, 'You are not enrolled in this course');
        }

        // Get course details
        $course = TrainingObjective::findOrFail($id);

        // Get instructor assignment for this course
        $instructorAssignment = StudentInstructorDistribution::where('student_id', $user->id)
            ->where('course_id', $id)
            ->with('instructor')
            ->first();

        // Get curriculum/topics for this course
        $curriculum = Curriculum::where('objective_id', $id)
            ->orderBy('id', 'asc')
            ->get();

        // Get course materials
        $materials = CourseMaterial::where('objective_id', $id)
            ->latest()
            ->get();

        // Get all schedules for this course (past and future)
        $allSchedules = collect();
        if ($instructorAssignment && $instructorAssignment->instructor_id) {
            $allSchedules = TrainingSchedule::where('instructor_id', $instructorAssignment->instructor_id)
                ->where('course_id', $id)
                ->where('batch_id', $user->enrolment_batch_id)
                ->orderBy('schedule_date', 'asc')
                ->with('topic')
                ->get();
        }

        // Separate past and upcoming schedules
        $now = Carbon::now();
        $completedSchedules = $allSchedules->filter(function($schedule) use ($now) {
            return Carbon::parse($schedule->schedule_date . ' ' . $schedule->time_stop)->isPast();
        });

        $upcomingSchedules = $allSchedules->filter(function($schedule) use ($now) {
            return Carbon::parse($schedule->schedule_date . ' ' . $schedule->time_stop)->isFuture();
        });

        $todaySchedule = $allSchedules->filter(function($schedule) {
            return Carbon::parse($schedule->schedule_date)->isToday();
        })->first();

        // Calculate progress (basic version)
        $totalSchedules = $allSchedules->count();
        $completedCount = $completedSchedules->count();
        $progressPercentage = $totalSchedules > 0 ? round(($completedCount / $totalSchedules) * 100) : 0;

        // Get theory and practical session counts
        $theoryCompleted = $completedSchedules->where('session_type', 'theory')->count();
        $practicalCompleted = $completedSchedules->where('session_type', 'practical')->count();
        $theoryTotal = $allSchedules->where('session_type', 'theory')->count();
        $practicalTotal = $allSchedules->where('session_type', 'practical')->count();

        // Next class
        $nextClass = $upcomingSchedules->first();

        // Course statistics
        $stats = [
            'total_topics' => $curriculum->count(),
            'total_materials' => $materials->count(),
            'total_classes' => $totalSchedules,
            'completed_classes' => $completedCount,
            'theory_progress' => $theoryTotal > 0 ? round(($theoryCompleted / $theoryTotal) * 100) : 0,
            'practical_progress' => $practicalTotal > 0 ? round(($practicalCompleted / $practicalTotal) * 100) : 0,
            'overall_progress' => $progressPercentage,
        ];

        return view('student.course-details', compact(
            'course',
            'instructorAssignment',
            'curriculum',
            'materials',
            'upcomingSchedules',
            'completedSchedules',
            'todaySchedule',
            'nextClass',
            'stats',
            'theoryCompleted',
            'theoryTotal',
            'practicalCompleted',
            'practicalTotal'
        ));
    }
}
