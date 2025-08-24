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

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function schedule()
    {
        return $this->belongsTo(TrainingSchedule::class, 'schedule_id');
    }

    public function course()
    {
        return $this->belongsTo(TrainingObjective::class, 'course_id');
    }

    public function markedBy()
    {
        return $this->belongsTo(User::class, 'marked_by');
    }
}
