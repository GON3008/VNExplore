<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_city',
        'tour_country',
        'tour_district',
        'tour_ward',
        'deleted',
    ];
}
