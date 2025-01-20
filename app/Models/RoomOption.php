<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomOption extends Model
{
    use HasFactory;

    protected $fillable =[
        'ro_id',
        'ro_price',
        'ro_discount',
        'ro_bed_type',
        'ro_quantity',
        'ro_description',
        'ro_status',
        'ro_max_guests',
        'ro_extra_bed_price',
        'ro_is_refundable',
        'ro_cancellation_policy',
        'ro_checkin_time',
        'ro_checkout_time',
        'ro_id_featured',
        'ro_views',
        'ro_area',
        'ro_hotel_room_id',
        'ro_hotel_category_id',
        'ro_created_by',
    ];

    public function ro_room_id()
    {
        return $this->belongsTo(HotelRooms::class, 'ro_hotel_room_id');
    }

    public function ro_category_id()
    {
        return $this->belongsTo(HotelCategories::class, 'ro_hotel_category_id');
    }

    public function ro_user_id()
    {
        return $this->belongsTo(User::class, 'ro_created_by');
    }

}
