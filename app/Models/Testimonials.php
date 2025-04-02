<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'testimony',
        'rating',
        'image_url',
        'website_visibility',
    ];
}
