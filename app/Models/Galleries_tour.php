<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galleries_tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'image_path',
    ];

    public function tour()
    {
        return $this->belongsTo(Tours::class, 'tour_id');
    }
}
