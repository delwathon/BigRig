<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;

    protected $table = 'student_attendance';

    protected $fillable = [
        'student_id',
        'schedule_id',
        'course_id',
        'status',
        'check_in_time',
        'check_out_time',
        'notes',
        'marked_by'
    ];

    protected $casts = [
        'check_in_time' => 'datetime:H:i',
        'check_out_time' => 'datetime:H:i',
    ];

    /**
     * Get the student for this attendance record
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the schedule for this attendance record
     */
    public function schedule()
    {
        return $this->belongsTo(TrainingSchedule::class, 'schedule_id');
    }

    /**
     * Get the course for this attendance record
     */
    public function course()
    {
        return $this->belongsTo(TrainingObjective::class, 'course_id');
    }

    /**
     * Get the user who marked this attendance
     */
    public function markedBy()
    {
        return $this->belongsTo(User::class, 'marked_by');
    }

    /**
     * Scope for present students
     */
    public function scopePresent($query)
    {
        return $query->where('status', 'present');
    }

    /**
     * Scope for absent students
     */
    public function scopeAbsent($query)
    {
        return $query->where('status', 'absent');
    }

    /**
     * Scope for late students
     */
    public function scopeLate($query)
    {
        return $query->where('status', 'late');
    }
}
