<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_city',
        'car_country',
        'car_district',
        'car_ward',
        'deleted',
    ];
}
