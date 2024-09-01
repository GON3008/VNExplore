<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\FlightCategories;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'price_discount',
        'flight_number',
        'departure_date',
        'return_date',
        'departure_time',
        'return_time',
        'flight_code',
        'quantity',
        'deleted',
        'category_id',
        'location_departure_id',
        'location_arrival_id',
    ];

    public function flightCategories(){
        return $this->belongsTo(FlightCategories::class, 'category_id');
    }

    public function tour(){
        return $this->belongsTo(Tours::class, 'tour_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function locationDeparture(){
        return $this->belongsTo(FlightLocation::class, 'location_departure_id');
    }

    public function locationArrival(){
        return $this->belongsTo(FlightLocation::class, 'location_arrival_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($flight) {
            $flight->flight_code = self::generateFlightCode($flight->category_id);
        });
    }

    private static function generateFlightCode($category_id){
        $category = FlightCategories::find($category_id);

        $category_prefix = strtoupper(substr($category->name, 0, 2));

        # Generate code
        do {
            $code = $category_prefix . '-' . strtoupper(Str::random(6));
        } while (self::where('flight_code', $code)->exists());

        return $code;
    }




}
