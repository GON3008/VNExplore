<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_option_id',
        'room_number',
        'status',
    ];

    public function room_option()
    {
        return $this->belongsTo(RoomOption::class, 'room_option_id');
    }
}
