<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentInstructorDistribution;
use App\Models\TrainingObjective;
use App\Models\User;
use App\Models\StudentAttendance;
use App\Models\TrainingSchedule;
use App\Models\StudentProgress;
use App\Models\Subscription;
use Carbon\Carbon;
use DB;

class StudentManagementController extends Controller
{
    /**
     * Display all students assigned to the instructor
     */
    public function index()
    {
        $instructor = Auth::user();

        // Get all students assigned to this instructor with their courses
        $students = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->with(['student', 'course'])
            ->get()
            ->groupBy('student_id')
            ->map(function($group) {
                $student = $group->first()->student;
                $student->courses = $group->pluck('course');

                // Calculate overall attendance for this student
                $attendanceStats = $this->getStudentAttendanceStats($student->id);
                $student->attendance_rate = $attendanceStats['rate'];
                $student->total_classes = $attendanceStats['total'];
                $student->classes_attended = $attendanceStats['present'];

                return $student;
            })
            ->values();

        // Get courses assigned to instructor
        $assignedCourseIds = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->pluck('course_id')
            ->unique();

        $courses = TrainingObjective::whereIn('id', $assignedCourseIds)->get();

        return view('instructor.students.index', compact('students', 'courses'));
    }

    /**
     * Display students for a specific course
     */
    public function byCourse($courseId)
    {
        $instructor = Auth::user();

        // Verify instructor has access to this course
        $hasAccess = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->where('course_id', $courseId)
            ->exists();

        if (!$hasAccess) {
            abort(403, 'Unauthorized access to this course.');
        }

        $course = TrainingObjective::findOrFail($courseId);

        // Get students enrolled in this course under this instructor
        $students = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->where('course_id', $courseId)
            ->with('student')
            ->get()
            ->map(function($distribution) use ($courseId) {
                $student = $distribution->student;

                // Get attendance stats for this specific course
                $attendanceStats = $this->getStudentCourseAttendanceStats($student->id, $courseId);
                $student->attendance_rate = $attendanceStats['rate'];
                $student->total_classes = $attendanceStats['total'];
                $student->classes_attended = $attendanceStats['present'];
                $student->classes_late = $attendanceStats['late'];
                $student->classes_absent = $attendanceStats['absent'];

                // Get last attendance date
                $lastAttendance = StudentAttendance::where('student_id', $student->id)
                    ->where('course_id', $courseId)
                    ->whereIn('status', ['present', 'late'])
                    ->orderBy('created_at', 'desc')
                    ->first();

                $student->last_attendance = $lastAttendance ? $lastAttendance->created_at : null;

                return $student;
            });

        // Get course statistics
        $courseStats = [
            'total_students' => $students->count(),
            'average_attendance' => $students->avg('attendance_rate'),
            'total_sessions' => TrainingSchedule::where('instructor_id', $instructor->id)
                ->where('course_id', $courseId)
                ->count(),
            'completed_sessions' => TrainingSchedule::where('instructor_id', $instructor->id)
                ->where('course_id', $courseId)
                ->where('schedule_date', '<', Carbon::now())
                ->count(),
        ];

        return view('instructor.students.course', compact('course', 'students', 'courseStats'));
    }

    /**
     * Display individual student details
     */
    public function show($id)
    {
        $instructor = Auth::user();
        $student = User::findOrFail($id);

        // Verify instructor has access to this student
        $hasAccess = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->where('student_id', $id)
            ->exists();

        if (!$hasAccess) {
            abort(403, 'Unauthorized access to this student.');
        }

        // Get courses this student is enrolled in under this instructor
        $enrolledCourses = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->where('student_id', $id)
            ->with('course')
            ->get()
            ->map(function($distribution) use ($id) {
                $course = $distribution->course;

                // Get attendance for this course
                $attendanceStats = $this->getStudentCourseAttendanceStats($id, $course->id);
                $course->attendance_rate = $attendanceStats['rate'];
                $course->classes_attended = $attendanceStats['present'];
                $course->total_classes = $attendanceStats['total'];

                // Get progress (theory vs practical)
                $schedules = TrainingSchedule::where('instructor_id', $distribution->instructor_id)
                    ->where('course_id', $course->id)
                    ->where('batch_id', $distribution->student->enrolment_batch_id)
                    ->get();

                $theoryCompleted = $schedules->where('session_type', 'theory')
                    ->filter(function($schedule) {
                        return Carbon::parse($schedule->schedule_date . ' ' . $schedule->time_stop)->isPast();
                    })->count();

                $practicalCompleted = $schedules->where('session_type', 'practical')
                    ->filter(function($schedule) {
                        return Carbon::parse($schedule->schedule_date . ' ' . $schedule->time_stop)->isPast();
                    })->count();

                $course->theory_progress = $schedules->where('session_type', 'theory')->count() > 0
                    ? round(($theoryCompleted / $schedules->where('session_type', 'theory')->count()) * 100)
                    : 0;

                $course->practical_progress = $schedules->where('session_type', 'practical')->count() > 0
                    ? round(($practicalCompleted / $schedules->where('session_type', 'practical')->count()) * 100)
                    : 0;

                return $course;
            });

        // Get recent attendance records
        $recentAttendance = StudentAttendance::where('student_id', $id)
            ->whereIn('course_id', $enrolledCourses->pluck('id'))
            ->with(['schedule.topic', 'course'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Overall statistics
        $overallStats = [
            'total_courses' => $enrolledCourses->count(),
            'average_attendance' => $enrolledCourses->avg('attendance_rate'),
            'total_classes_attended' => $enrolledCourses->sum('classes_attended'),
            'total_classes' => $enrolledCourses->sum('total_classes'),
        ];

        // Get subscription info
        $subscription = Subscription::where('user_id', $id)
            ->where('payment_status', 'completed')
            ->latest()
            ->first();

        return view('instructor.students.show', compact(
            'student',
            'enrolledCourses',
            'recentAttendance',
            'overallStats',
            'subscription'
        ));
    }

    /**
     * Get student attendance statistics
     */
    private function getStudentAttendanceStats($studentId)
    {
        $stats = StudentAttendance::where('student_id', $studentId)
            ->selectRaw('
                COUNT(*) as total,
                SUM(CASE WHEN status = "present" THEN 1 ELSE 0 END) as present,
                SUM(CASE WHEN status = "late" THEN 1 ELSE 0 END) as late,
                SUM(CASE WHEN status = "absent" THEN 1 ELSE 0 END) as absent
            ')
            ->first();

        $rate = $stats->total > 0
            ? round((($stats->present + $stats->late) / $stats->total) * 100)
            : 0;

        return [
            'total' => $stats->total,
            'present' => $stats->present + $stats->late,
            'absent' => $stats->absent,
            'late' => $stats->late,
            'rate' => $rate
        ];
    }

    /**
     * Get student attendance statistics for a specific course
     */
    private function getStudentCourseAttendanceStats($studentId, $courseId)
    {
        $stats = StudentAttendance::where('student_id', $studentId)
            ->where('course_id', $courseId)
            ->selectRaw('
                COUNT(*) as total,
                SUM(CASE WHEN status = "present" THEN 1 ELSE 0 END) as present,
                SUM(CASE WHEN status = "late" THEN 1 ELSE 0 END) as late,
                SUM(CASE WHEN status = "absent" THEN 1 ELSE 0 END) as absent
            ')
            ->first();

        $rate = $stats->total > 0
            ? round((($stats->present + $stats->late) / $stats->total) * 100)
            : 0;

        return [
            'total' => $stats->total,
            'present' => $stats->present,
            'late' => $stats->late,
            'absent' => $stats->absent,
            'rate' => $rate
        ];
    }
}
