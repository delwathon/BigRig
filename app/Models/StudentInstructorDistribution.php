<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInstructorDistribution extends Model
{
    use HasFactory;

    protected $table = 'student_instructor_distributions';

    protected $fillable = [
        'student_id',
        'instructor_id',
        'course_id',
        'enrolment_batch_id', // FIXED: Changed from 'batch_id' to 'enrolment_batch_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function course()
    {
        return $this->belongsTo(TrainingObjective::class, 'course_id');
    }

    public function batch()
    {
        return $this->belongsTo(EnrolmentBatch::class, 'enrolment_batch_id'); // FIXED: Specify the foreign key
    }
}
