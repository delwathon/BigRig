<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TrainingSchedule;
use App\Models\StudentInstructorDistribution;
use App\Models\Subscription;
use Carbon\Carbon;

class StudentScheduleController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $selectedCourseId = $request->get('course_id', 'all');
        $view = $request->get('view', 'list'); // list or calendar

        // Get student's enrolled courses
        $subscription = Subscription::where('user_id', $user->id)
            ->where('payment_status', 'completed')
            ->latest()
            ->first();

        $enrolledCourses = collect();
        if ($subscription) {
            $enrolledCourses = $subscription->objectives;
        }

        // Get all instructor assignments
        $instructorAssignments = StudentInstructorDistribution::where('student_id', $user->id)
            ->with(['instructor', 'course'])
            ->get();

        // Build schedule query
        $schedulesQuery = TrainingSchedule::query()
            ->where('batch_id', $user->enrolment_batch_id)
            ->with(['topic', 'course', 'instructor']);

        // Filter by selected course if not 'all'
        if ($selectedCourseId !== 'all') {
            $schedulesQuery->where('course_id', $selectedCourseId);

            // Get specific instructor for this course
            $instructorAssignment = $instructorAssignments->where('course_id', $selectedCourseId)->first();
            if ($instructorAssignment) {
                $schedulesQuery->where('instructor_id', $instructorAssignment->instructor_id);
            }
        } else {
            // Get all schedules for all assigned instructors
            $instructorIds = $instructorAssignments->pluck('instructor_id')->unique();
            $courseIds = $instructorAssignments->pluck('course_id');

            if ($instructorIds->isNotEmpty()) {
                $schedulesQuery->whereIn('instructor_id', $instructorIds)
                    ->whereIn('course_id', $courseIds);
            }
        }

        // Get schedules
        $schedules = $schedulesQuery->orderBy('schedule_date', 'asc')
            ->orderBy('time_start', 'asc')
            ->get();

        // Group schedules by date for list view
        $groupedSchedules = $schedules->groupBy(function($schedule) {
            return Carbon::parse($schedule->schedule_date)->format('Y-m-d');
        });

        // Prepare calendar data if calendar view
        $calendarEvents = [];
        if ($view === 'calendar') {
            $calendarEvents = $schedules->map(function($schedule) {
                return [
                    'id' => $schedule->id,
                    'title' => $schedule->topic->topic,
                    'start' => $schedule->schedule_date . 'T' . $schedule->time_start,
                    'end' => $schedule->schedule_date . 'T' . $schedule->time_stop,
                    'color' => $schedule->session_type === 'theory' ? '#8B5CF6' : '#10B981',
                    'extendedProps' => [
                        'course' => $schedule->course->objective,
                        'instructor' => $schedule->instructor->firstName . ' ' . $schedule->instructor->lastName,
                        'type' => $schedule->session_type,
                    ]
                ];
            });
        }

        // Get statistics
        $stats = [
            'total_classes' => $schedules->count(),
            'completed_classes' => $schedules->where('schedule_date', '<', Carbon::now())->count(),
            'upcoming_classes' => $schedules->where('schedule_date', '>=', Carbon::now())->count(),
            'theory_sessions' => $schedules->where('session_type', 'theory')->count(),
            'practical_sessions' => $schedules->where('session_type', 'practical')->count(),
        ];

        return view('student.schedule', compact(
            'groupedSchedules',
            'enrolledCourses',
            'selectedCourseId',
            'view',
            'calendarEvents',
            'stats',
            'instructorAssignments'
        ));
    }

    public function calendar()
    {
        return $this->index(request()->merge(['view' => 'calendar']));
    }
}
