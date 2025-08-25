<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentInstructorDistribution;
use App\Models\TrainingSchedule;
use App\Models\StudentAttendance;
use App\Models\CourseMaterial;
use App\Models\TrainingObjective;
use App\Models\EnrolmentBatch;
use App\Models\Curriculum;
use Carbon\Carbon;
use DB;

class InstructorDashboardController extends Controller
{
    public function index()
    {
        $instructor = Auth::user();

        // Get courses assigned to this instructor
        $assignedCourseIds = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->pluck('course_id')
            ->unique();

        $assignedCourses = TrainingObjective::whereIn('id', $assignedCourseIds)->get();

        // Get all assigned students count
        $totalStudents = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->distinct('student_id')
            ->count('student_id');

        // Get students by course
        $studentsByCourse = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->with(['student', 'course'])
            ->get()
            ->groupBy('course_id');

        // Get today's schedule
        $todaySchedule = TrainingSchedule::where('instructor_id', $instructor->id)
            ->whereDate('schedule_date', Carbon::today())
            ->with(['course', 'topic', 'batch'])
            ->orderBy('time_start')
            ->get();

        // Get upcoming schedule (next 7 days)
        $upcomingSchedule = TrainingSchedule::where('instructor_id', $instructor->id)
            ->whereBetween('schedule_date', [Carbon::tomorrow(), Carbon::now()->addDays(7)])
            ->with(['course', 'topic', 'batch'])
            ->orderBy('schedule_date')
            ->orderBy('time_start')
            ->take(10)
            ->get();

        // Get attendance statistics for this week
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();

        // Get weekly attendance stats
        $weeklySchedules = TrainingSchedule::where('instructor_id', $instructor->id)
            ->whereBetween('schedule_date', [$weekStart, $weekEnd])
            ->pluck('id');

        $weeklyAttendance = StudentAttendance::whereIn('schedule_id', $weeklySchedules)
            ->selectRaw('
                COUNT(DISTINCT student_id) as total_records,
                SUM(CASE WHEN status = "present" THEN 1 ELSE 0 END) as present_count,
                SUM(CASE WHEN status = "absent" THEN 1 ELSE 0 END) as absent_count,
                SUM(CASE WHEN status = "late" THEN 1 ELSE 0 END) as late_count
            ')
            ->first();

        $attendanceRate = $weeklyAttendance && $weeklyAttendance->total_records > 0
            ? round((($weeklyAttendance->present_count + $weeklyAttendance->late_count) / $weeklyAttendance->total_records) * 100)
            : 0;

        // Recent materials uploaded
        $recentMaterials = CourseMaterial::whereIn('objective_id', $assignedCourseIds)
            ->where('uploaded_by', $instructor->id)
            ->latest()
            ->take(5)
            ->get();

        // Pending attendance marking - Fixed query
        $pendingAttendance = TrainingSchedule::where('instructor_id', $instructor->id)
            ->where('schedule_date', '<', Carbon::now())
            ->whereNotExists(function($query) {
                $query->select(DB::raw(1))
                    ->from('student_attendance')
                    ->whereColumn('student_attendance.schedule_id', 'training_schedules.id');
            })
            ->count();

        // Alternative way to check pending attendance if the above doesn't work
        if ($pendingAttendance === null) {
            $pastSchedules = TrainingSchedule::where('instructor_id', $instructor->id)
                ->where('schedule_date', '<', Carbon::now())
                ->pluck('id');

            $schedulesWithAttendance = StudentAttendance::whereIn('schedule_id', $pastSchedules)
                ->distinct('schedule_id')
                ->pluck('schedule_id');

            $pendingAttendance = $pastSchedules->diff($schedulesWithAttendance)->count();
        }

        // Stats for dashboard
        $stats = [
            'total_courses' => $assignedCourses->count(),
            'total_students' => $totalStudents,
            'today_classes' => $todaySchedule->count(),
            'weekly_attendance' => $attendanceRate,
            'pending_attendance' => $pendingAttendance,
            'materials_uploaded' => CourseMaterial::where('uploaded_by', $instructor->id)->count(),
        ];

        return view('instructor.dashboard', compact(
            'assignedCourses',
            'studentsByCourse',
            'todaySchedule',
            'upcomingSchedule',
            'recentMaterials',
            'stats'
        ));
    }
}
