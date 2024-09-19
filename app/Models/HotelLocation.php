<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_country',
        'hotel_city',
        'hotel_district',
        'hotel_ward',
        'deleted'
    ];
}
