<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Tymon\JWTAuth\Contracts\JWTSubject; // Import JWTSubject contract
use App\Models\Messager;

class User extends Authenticatable implements JWTSubject // Implement JWTSubject
{
    use HasFactory, Notifiable, HasApiTokens, TwoFactorAuthenticatable, HasProfilePhoto;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'is_verified',
        'status',
        'is_admin',
        'avatar',
        'deleted',
        'google_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'deleted' => 'boolean',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($user) {
            $user->is_admin = $user->role === 'admin' ? 1 : 0;
        });
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isClient()
    {
        return $this->role === 'client';
    }

    public function isLead()
    {
        return $this->role === 'lead';
    }

    public function sentMessages()
    {
        return $this->hasMany(Messager::class, 'sender_id');
    }

    public function receivedMessages()
    {
        return $this->hasMany(Messager::class, 'receiver_id');
    }

    // Required by JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
