<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curriculum;

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
        'price',
        'duration',
        'requirement',
        'image_url',
        'course_details',
    ];

    protected $table = 'training_objectives';

    public function curriculum()
    {
        return $this->hasMany(Curriculum::class, 'objective_id');
    }
    
}
