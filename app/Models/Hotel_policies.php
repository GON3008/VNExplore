<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel_policies extends Model
{
    use HasFactory;

    protected $fillable =[
        'hp_id',
        'hp_payment_policy',
        'hp_cancellation_fee',
        'hp_free_cancellation_days',
        'hp_booking_fee',
        'hp_is_free_cancellation',
        'hp_checkin_time',
        'hp_checkout_time',
        'hp_policy_notes',
        'hp_late_checkout_fee',
        'hp_early_checkin_fee',
        'hp_allows_smoking',
        'hp_is_child_friendly',
        'hp_hotel_room_id',
    ];

    public function hotelRoom_id()
    {
        return $this->belongsTo(HotelRooms::class, 'hp_hotel_room_id');
    }
}
