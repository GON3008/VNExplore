<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBookings extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_option_id',
        'room_detail_id',
        'user_id',
        'date',
        'status',
    ];

    public function room_option_id()
    {
        return $this->belongsTo(RoomOption::class, 'room_option_id');
    }

    public function room_detail()
    {
        return $this->belongsTo(RoomDetails::class, 'room_detail_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
