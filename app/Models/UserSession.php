<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'jwt_token',
        'ip_address',
        'user_agent',
        'device_type',
        'login_time',
        'logout_time',
        'is_active',
    ];

}
