<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_city',
        'flight_country',
        'flight_district',
        'flight_ward',
        'deleted',
    ];
}
