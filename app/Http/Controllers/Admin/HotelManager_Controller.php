<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelCategories;
use App\Models\HotelRooms;
use App\Models\User;
use App\Models\RoomOption;

class HotelManager_Controller extends Controller
{
    public function index()
    {
        $hotelCategory = HotelCategories::all();
        $hotelRoom = HotelRooms::all();
        $created_by = User::all();
        $room_option_id = RoomOption::all();
        return view('admin.hotel_manager.index', compact('hotelCategory',
            'hotelRoom', 'created_by', 'room_option_id'));
    }
}
