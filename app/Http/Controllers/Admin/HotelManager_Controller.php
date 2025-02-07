<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelCategories;
use App\Models\HotelRooms;
use App\Models\User;

class HotelManager_Controller extends Controller
{
    public function index()
    {
        $hotelCategory = HotelCategories::all();
        $hotelRoom = HotelRooms::all();
        $created_by = User::all();
        return view('admin.hotel_manager.index', compact('hotelCategory', 'hotelRoom', 'created_by'));
    }
}
