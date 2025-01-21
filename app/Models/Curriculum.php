<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TrainingObjective;

class Curriculum extends Model
{
    use HasFactory;

    protected $fillable = [
        'objective_id',
        'topic',
        'summary',
    ];

    protected $table = 'curriculum';

    public function trainingObjective()
    {
        return $this->belongsTo(TrainingObjective::class, 'objective_id');
    }
}
