<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancellationPolicies extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_option_id',
        'free_cancellation_until',
        'apply_before',
        'apply_after',
        'amount',
        'currency',
        'modification_policy',
        'time_zone',
    ];

    public function room_option_id()
    {
        return $this->belongsTo(RoomOption::class, 'room_option_id');
    }
}
