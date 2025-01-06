<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow Laravel's naming conventions
    protected $table = 'role_permission';

    // Specify the primary key (if it's not 'id')
    // protected $primaryKey = 'some_custom_primary_key';

    // You can define fillable properties here, if needed
    protected $fillable = ['role_id', 'permission_id'];
}
