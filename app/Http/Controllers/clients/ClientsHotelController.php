<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\HotelCategories;
use Illuminate\Http\Request;

class ClientsHotelController extends Controller
{
    const PATH_UPLOAD = 'HotelCategories';
    public function index(){
        $data = HotelCategories::query()->where('deleted', 0)->get();
        return view('clients.hotels.index', compact('data'));
    }
}
