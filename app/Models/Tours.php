<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Import the Str class

class Tours extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'price',
        'vehicle',
        'departure_date',
        'return_date',
        'tour_code',
        'departure',
        'tour_time',
        'tour_to',
        'quantity',
        'deleted',
        'category_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tour) {
            $tour->tour_code = self::generateTourCode();
        });
    }

    private static function generateTourCode()
    {
        do {
            $code = 'Tour-' . strtoupper(Str::random(6));
        } while (self::where('tour_code', $code)->exists());

        return $code;
    }

    public function category()
    {
        return $this->belongsTo(TourCategories::class, 'category_id');
    }

    public  function scopeNotDeleted($query)
    {
        return $query->where('deleted', 0);
    }

    public function images()
    {
        return $this->hasMany(Galleries_tour::class, 'tour_id');
    }
}
