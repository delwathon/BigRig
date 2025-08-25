<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_id',
        'course_id',
        'instructor_id',
        'topic_id',
        'session_type',
        'schedule_date',
        'time_start',
        'time_stop',
        'students',
    ];

    protected $casts = [
        'schedule_date' => 'date',
        'students' => 'array', // If students is stored as JSON
    ];

    // Relationships
    public function batch()
    {
        return $this->belongsTo(EnrolmentBatches::class, 'batch_id');
    }

    public function course()
    {
        return $this->belongsTo(TrainingObjective::class, 'course_id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function topic()
    {
        return $this->belongsTo(Curriculum::class, 'topic_id');
    }

    /**
     * Get the attendance records for this schedule
     */
    public function attendances()
    {
        return $this->hasMany(StudentAttendance::class, 'schedule_id');
    }

    /**
     * Check if attendance has been marked for this schedule
     */
    public function hasAttendanceMarked()
    {
        return $this->attendances()->exists();
    }

    /**
     * Get attendance for a specific student
     */
    public function getAttendanceForStudent($studentId)
    {
        return $this->attendances()->where('student_id', $studentId)->first();
    }
}
