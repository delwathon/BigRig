<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailConfig extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'from_name',
        'from_email',
        'smtp_username',
        'smtp_password',
        'smtp_host',
        'smtp_port',
        'smtp_encryption',
    ];

    protected $table = 'email_configs';
}
