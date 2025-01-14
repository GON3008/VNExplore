<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\HotelCategories;
use App\Models\HotelRooms;
use App\Models\Voucher;
use App\Models\HotelLocation;
use Illuminate\Http\Request;

class ClientsHotelController extends Controller
{
    const PATH_UPLOAD = 'HotelCategories';
    public function index(){
        $data = HotelCategories::query()
            ->with('category','service','rooms')
            ->where('hotelCategory_deleted', 1)
            ->paginate(20);
        $vouchers = Voucher::where('deleted', 1)->paginate(5);
        $hotelLocations = HotelLocation::where('deleted', 1)->paginate(20);
        return view('clients.hotels.hotel_list', compact('data','vouchers','hotelLocations'));
    }

    public function hotelRoomShow($hotel_category_id)
    {
        $hotelCategory = HotelCategories::findOrFail($hotel_category_id);
        $hotelRooms = HotelRooms::where('hotel_category_id', $hotel_category_id)->get();

        return view('clients.hotels.hotel_detail', compact('hotelCategory', 'hotelRooms'));
    }

}
