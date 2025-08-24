<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curriculum;
use App\Models\CourseMaterial;

class TrainingObjective extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'objective',
        'duration',
        'theory_session',
        'practical_session',
        'examination',
        'price',
        'course_details',
        'requirement',
        'image_url',
        'video_thumbnail_url',
        'video_url',
    ];

    protected $table = 'training_objectives';

    public function curriculum()
    {
        return $this->hasMany(Curriculum::class, 'objective_id');
    }

    public function materials()
    {
        return $this->hasMany(CourseMaterial::class, 'objective_id');
    }

    public function courseMaterials()
    {
        return $this->hasMany(CourseMaterial::class, 'objective_id');
    }

}
