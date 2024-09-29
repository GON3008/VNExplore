<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelServices extends Model
{
    use HasFactory;

    const Active = 1;
    const Inactive = 0;

    protected $fillable = [
        'hotel_room_id',
        'wifi',
        'parking',
        'restaurant',
        'bar',
        'swimming_poll',
        'gym',
        'laundry',
        'air_conditioning',
        'kitchen',
        'status',
        'deleted'
    ];
}
