<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotelCategory_name',
        'hotelCategory_description',
        'hotelCategory_images',
        'hotelCategory_status',
        'hotelCategory_deleted',
        'hotelCategory_rating',
        'list_categories_id',
        'hotel_location_id',
        'hotel_service_id',
    ];

    public function category(){
        return $this->belongsTo(ListCategories::class, 'list_categories_id');
    }

    public function location(){
        return $this->belongsTo(HotelLocation::class, 'hotel_location_id');
    }

    public function service(){
        return $this->belongsTo(HotelServices::class, 'hotel_service_id');
    }

    public function rooms()
    {
        return $this->hasMany(HotelRooms::class, 'hotel_category_id');
    }

    public function getLowestPrice()
    {
        return $this->rooms()->min('room_price');
    }
}
