<?php

namespace App\Models;

use App\Models\ListCategories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'images',
        'status',
        'deleted',
        'rating',
        'category_id',
    ];

    public function category(){
        return $this->belongsTo(ListCategories::class, 'category_id');
    }
}
