<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourCategories extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'description',
        'status',
        'deleted',
    ];
}
