<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAttendance;
use Carbon\Carbon;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get attendance statistics
        $attendanceStats = StudentAttendance::where('student_id', $user->id)
            ->selectRaw('
                COUNT(*) as total,
                SUM(CASE WHEN status = "present" THEN 1 ELSE 0 END) as present,
                SUM(CASE WHEN status = "late" THEN 1 ELSE 0 END) as late,
                SUM(CASE WHEN status = "absent" THEN 1 ELSE 0 END) as absent,
                SUM(CASE WHEN status = "excused" THEN 1 ELSE 0 END) as excused
            ')
            ->first();

        $attendancePercentage = $attendanceStats->total > 0
            ? round((($attendanceStats->present + $attendanceStats->late) / $attendanceStats->total) * 100)
            : 0;

        // Get detailed attendance records
        $attendanceRecords = StudentAttendance::where('student_id', $user->id)
            ->with(['schedule.topic', 'course'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('student.attendance', compact(
            'attendanceStats',
            'attendancePercentage',
            'attendanceRecords'
        ));
    }
}
