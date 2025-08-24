<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TrainingSchedule;
use App\Models\StudentAttendance;
use App\Models\StudentInstructorDistribution;
use App\Models\User;
use Carbon\Carbon;
use DB;

class AttendanceController extends Controller
{
    /**
     * Display attendance overview
     */
    public function index()
    {
        $instructor = Auth::user();

        // Get schedules that need attendance marking
        $pendingSchedules = TrainingSchedule::where('instructor_id', $instructor->id)
            ->whereDate('schedule_date', '<=', Carbon::today())
            ->with(['course', 'topic', 'batch'])
            ->orderBy('schedule_date', 'desc')
            ->orderBy('time_start', 'desc')
            ->get()
            ->filter(function($schedule) {
                // Check if attendance has been marked for this schedule
                $studentsInClass = StudentInstructorDistribution::where('instructor_id', $schedule->instructor_id)
                    ->where('course_id', $schedule->course_id)
                    ->count();

                $attendanceMarked = StudentAttendance::where('schedule_id', $schedule->id)->count();

                return $attendanceMarked < $studentsInClass;
            });

        // Get recent attendance records
        $recentAttendance = TrainingSchedule::where('instructor_id', $instructor->id)
            ->whereHas('attendances')
            ->with(['course', 'topic', 'batch', 'attendances'])
            ->orderBy('schedule_date', 'desc')
            ->take(10)
            ->get();

        // Get attendance statistics for the month
        $monthStart = Carbon::now()->startOfMonth();
        $monthEnd = Carbon::now()->endOfMonth();

        $monthlyStats = DB::table('training_schedules')
            ->join('student_attendance', 'training_schedules.id', '=', 'student_attendance.schedule_id')
            ->where('training_schedules.instructor_id', $instructor->id)
            ->whereBetween('training_schedules.schedule_date', [$monthStart, $monthEnd])
            ->select(
                DB::raw('COUNT(DISTINCT student_attendance.id) as total_records'),
                DB::raw('SUM(CASE WHEN student_attendance.status = "present" THEN 1 ELSE 0 END) as present'),
                DB::raw('SUM(CASE WHEN student_attendance.status = "absent" THEN 1 ELSE 0 END) as absent'),
                DB::raw('SUM(CASE WHEN student_attendance.status = "late" THEN 1 ELSE 0 END) as late'),
                DB::raw('SUM(CASE WHEN student_attendance.status = "excused" THEN 1 ELSE 0 END) as excused')
            )
            ->first();

        return view('instructor.attendance.index', compact('pendingSchedules', 'recentAttendance', 'monthlyStats'));
    }

    /**
     * Show attendance marking form for a specific schedule
     */
    public function mark($scheduleId)
    {
        $instructor = Auth::user();

        // Get the schedule
        $schedule = TrainingSchedule::where('id', $scheduleId)
            ->where('instructor_id', $instructor->id)
            ->with(['course', 'topic', 'batch'])
            ->firstOrFail();

        // Get students enrolled in this course under this instructor
        $students = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->where('course_id', $schedule->course_id)
            ->with('student')
            ->get()
            ->map(function($distribution) use ($schedule) {
                $student = $distribution->student;

                // Check if attendance already marked
                $existingAttendance = StudentAttendance::where('student_id', $student->id)
                    ->where('schedule_id', $schedule->id)
                    ->first();

                $student->attendance = $existingAttendance;
                $student->status = $existingAttendance ? $existingAttendance->status : null;

                return $student;
            });

        // Get attendance summary for this schedule
        $attendanceSummary = StudentAttendance::where('schedule_id', $schedule->id)
            ->selectRaw('
                COUNT(*) as total,
                SUM(CASE WHEN status = "present" THEN 1 ELSE 0 END) as present,
                SUM(CASE WHEN status = "absent" THEN 1 ELSE 0 END) as absent,
                SUM(CASE WHEN status = "late" THEN 1 ELSE 0 END) as late,
                SUM(CASE WHEN status = "excused" THEN 1 ELSE 0 END) as excused
            ')
            ->first();

        return view('instructor.attendance.mark', compact('schedule', 'students', 'attendanceSummary'));
    }

    /**
     * Save attendance records
     */
    public function save(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:training_schedules,id',
            'attendance' => 'required|array',
            'attendance.*.student_id' => 'required|exists:users,id',
            'attendance.*.status' => 'required|in:present,absent,late,excused',
            'attendance.*.notes' => 'nullable|string|max:255'
        ]);

        $instructor = Auth::user();
        $schedule = TrainingSchedule::findOrFail($request->schedule_id);

        // Verify instructor has access to this schedule
        if ($schedule->instructor_id != $instructor->id) {
            abort(403, 'Unauthorized access to this schedule.');
        }

        DB::beginTransaction();
        try {
            foreach ($request->attendance as $record) {
                StudentAttendance::updateOrCreate(
                    [
                        'student_id' => $record['student_id'],
                        'schedule_id' => $schedule->id,
                    ],
                    [
                        'course_id' => $schedule->course_id,
                        'status' => $record['status'],
                        'notes' => $record['notes'] ?? null,
                        'marked_by' => $instructor->id,
                        'check_in_time' => $record['status'] != 'absent' ? now()->format('H:i:s') : null,
                    ]
                );
            }

            DB::commit();

            return redirect()->route('instructor.attendance')
                ->with('success', 'Attendance has been marked successfully.');

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()
                ->with('error', 'Failed to save attendance. Please try again.')
                ->withInput();
        }
    }

    /**
     * Edit attendance for a specific class
     */
    public function edit($scheduleId)
    {
        return $this->mark($scheduleId);
    }

    /**
     * Get attendance report for a course
     */
    public function report(Request $request)
    {
        $instructor = Auth::user();

        $courseId = $request->input('course_id');
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth());
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth());

        // Get courses for filter dropdown
        $courses = StudentInstructorDistribution::where('instructor_id', $instructor->id)
            ->distinct('course_id')
            ->with('course')
            ->get()
            ->pluck('course');

        if ($courseId) {
            // Get attendance data for the selected course
            $schedules = TrainingSchedule::where('instructor_id', $instructor->id)
                ->where('course_id', $courseId)
                ->whereBetween('schedule_date', [$startDate, $endDate])
                ->with(['attendances.student', 'topic'])
                ->orderBy('schedule_date')
                ->get();

            // Get all students in this course
            $students = StudentInstructorDistribution::where('instructor_id', $instructor->id)
                ->where('course_id', $courseId)
                ->with('student')
                ->get()
                ->pluck('student');

            // Build attendance matrix
            $attendanceMatrix = [];
            foreach ($students as $student) {
                $studentAttendance = [];
                foreach ($schedules as $schedule) {
                    $attendance = $schedule->attendances->where('student_id', $student->id)->first();
                    $studentAttendance[$schedule->id] = $attendance ? $attendance->status : 'not_marked';
                }

                // Calculate statistics
                $stats = [
                    'present' => collect($studentAttendance)->filter(fn($s) => $s == 'present')->count(),
                    'absent' => collect($studentAttendance)->filter(fn($s) => $s == 'absent')->count(),
                    'late' => collect($studentAttendance)->filter(fn($s) => $s == 'late')->count(),
                    'excused' => collect($studentAttendance)->filter(fn($s) => $s == 'excused')->count(),
                ];

                $total = $stats['present'] + $stats['absent'] + $stats['late'] + $stats['excused'];
                $attendanceRate = $total > 0 ? round((($stats['present'] + $stats['late']) / $total) * 100) : 0;

                $attendanceMatrix[] = [
                    'student' => $student,
                    'attendance' => $studentAttendance,
                    'stats' => $stats,
                    'rate' => $attendanceRate
                ];
            }

            return view('instructor.attendance.report', compact(
                'courses',
                'schedules',
                'attendanceMatrix',
                'courseId',
                'startDate',
                'endDate'
            ));
        }

        return view('instructor.attendance.report', compact('courses'));
    }
}
