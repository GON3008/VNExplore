<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_name',
        'room_price',
        'room_discount',
        'room_images',
        'room_description',
        'room_rating',
        'availability_status',
        'cleaning_status',
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

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

    public function roomOptions()
    {
        return $this->hasMany(RoomOption::class, 'ro_hotel_room_id');
    }

}
