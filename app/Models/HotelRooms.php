<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'room_price',
        'room_discount',
        'room_images',
        'room_description',
        'room_rating',
        'room_status',
        'refund_available',
        'refund_deadline',
        'guests',
        'bed_type',
        'hotel_category_id',
        'hotel_service_id',
        'hotel_location_id',
        'room_type_id',
    ];

    public function category()
    {
        return $this->belongsTo(HotelCategories::class, 'hotel_category_id');
    }

    public function service()
    {
        return $this->belongsTo(HotelServices::class, 'hotel_service_id');
    }

    public function location()
    {
        return $this->belongsTo(HotelLocation::class, 'hotel_location_id');
    }

}
