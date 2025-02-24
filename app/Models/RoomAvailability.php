<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomAvailability extends Model
{
    use HasFactory;

    protected $fillable=[
        'room_option_id',
        'date',
        'available_rooms',
        'booked_rooms',
        'maintenance_rooms',
        'unavailable_rooms'
    ];

    public function room_option()
    {
        return $this->belongsTo(RoomOption::class);
    }
}
