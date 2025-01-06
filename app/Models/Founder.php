<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Founder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'founder_name',
        'signature',
        'speech_title',
        'speech_content',
        'facebook_handle',
        'twitter_handle',
        'linkedin_handle',
        'instagram_handle',
        'founder_picture',
        'secondary_picture',
    ];

    protected $table = 'founder'; // Specify the table name
}
