<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleChangeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'instructor_id',
        'type',
        'reason',
        'new_date',
        'new_time_start',
        'new_time_stop',
        'substitute_instructor_id',
        'status',
        'admin_notes',
        'reviewed_by',
        'requested_at',
        'reviewed_at'
    ];

    protected $casts = [
        'requested_at' => 'datetime',
        'reviewed_at' => 'datetime',
        'new_date' => 'date',
    ];

    public function schedule()
    {
        return $this->belongsTo(TrainingSchedule::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function substituteInstructor()
    {
        return $this->belongsTo(User::class, 'substitute_instructor_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
