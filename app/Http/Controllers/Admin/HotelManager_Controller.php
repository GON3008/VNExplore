<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HotelManager_Controller extends Controller
{
    public function index()
    {
        return view ('admin.hotel_manager.index');
    }
}
