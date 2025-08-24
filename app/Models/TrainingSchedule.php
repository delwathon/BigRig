<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrainingObjective;
use App\Models\Curriculum;
use App\Models\User;

class TrainingSchedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'batch_id',
        'instructor_id',
        'course_id',
        'topic_id',
        'session_type',
        'students',
        'schedule_date',
        'time_start',
        'time_stop'
    ];

    protected $table = 'training_schedules';

    public function instructor()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(TrainingObjective::class);
    }

    public function topic()
    {
        return $this->belongsTo(Curriculum::class);
    }

}
