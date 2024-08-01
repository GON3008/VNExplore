<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;


    protected $fillable = [
        'country',
        'city',
        'district',
        'ward',
        'deleted',
        'tour_count',
        'user_count',
        'hotel_count',
        'flight_count',
        'car_count',
    ];

}
