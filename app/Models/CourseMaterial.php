<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'objective_id',
        'file_name',
        'file_url',
        'file_size',
        'file_type',
        'description',
        'uploaded_by'
    ];

    /**
     * Get the course/objective that owns this material
     */
    public function objective()
    {
        return $this->belongsTo(TrainingObjective::class, 'objective_id');
    }

    /**
     * Alternative name for the same relationship (course)
     */
    public function course()
    {
        return $this->belongsTo(TrainingObjective::class, 'objective_id');
    }

    /**
     * Get the user who uploaded this material
     */
    public function uploadedBy()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Get the uploader's name
     */
    public function getUploaderNameAttribute()
    {
        if ($this->uploadedBy) {
            return $this->uploadedBy->firstName . ' ' . $this->uploadedBy->lastName;
        }
        return 'Unknown';
    }

    /**
     * Check if file exists
     */
    public function fileExists()
    {
        return \Storage::disk('public')->exists($this->file_url);
    }
}
