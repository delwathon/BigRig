<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInstructorDistribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrolment_batch_id',
        'student_id',
        'instructor_id',
        'course_id'
    ];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(TrainingObjective::class, 'course_id');
    }

    public function enrolmentBatch()
    {
        return $this->belongsTo(EnrolmentBatch::class, 'enrolment_batch_id');
    }
}
