<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrainingObjective;
use App\Models\Curriculum;
use App\Models\Instructors;

class TrainingSchedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'instructor_id',
        'objective_id',
        'curriculum_id',
        'schedule_date',
        'time_start',
        'time_stop'
    ];

    protected $table = 'training_schedules';

    public function instructor()
    {
        return $this->belongsTo(Instructors::class);
    }

    public function objective()
    {
        return $this->belongsTo(TrainingObjective::class);
    }

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }

}
