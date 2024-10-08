<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\HotelCategories;
use Illuminate\Http\Request;

class ClientsHotelController extends Controller
{
    const PATH_UPLOAD = 'HotelCategories';
    public function index(){
        $data = HotelCategories::query()
            ->with('category','service','rooms')
            ->where('hotelCategory_deleted', 1)
            ->paginate(6);
        return view('clients.hotels.index', compact('data'));
    }
}
