<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrainingObjective;

class CourseMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'objective_id',
        'file_name',
        'file_url',
    ];

    protected $table = 'course_materials';

    public function trainingObjective()
    {
        return $this->belongsTo(TrainingObjective::class, 'objective_id');
    }
}
