<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'price_discount',
        'vehicle',
        'flight_number',
        'departure_date',
        'return_date',
        'flight_code',
        'departure',
        'flight_time',
        'flight_to',
        'quantity',
        'deleted',
        'slug',
        'category_id',
        'user_id',
        'departure_location_id',
        'arrival_location_id',
        'tour_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
