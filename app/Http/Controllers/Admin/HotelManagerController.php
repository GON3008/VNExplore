<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CancellationPolicies;
use App\Models\HotelCategories;
use App\Models\HotelRooms;
use App\Models\RoomAvailability;
use App\Models\RoomBookings;
use App\Models\RoomDetails;
use App\Models\User;
use App\Models\RoomOption;

class HotelManagerController extends Controller
{
    public function index()
    {
        $hotelCategory = HotelCategories::all();
        $hotelRoom = HotelRooms::all();
        $created_by = User::all();
        $roomDetails = RoomDetails::all();
        $roomOption = RoomOption::all();

        // Lấy danh sách id đã sử dụng trong từng bảng riêng biệt
        $usedRoomOptions = CancellationPolicies::pluck('room_option_id')->toArray();
        $usedRoomAvail = RoomAvailability::pluck('room_option_id')->toArray();
        $usedRoomBook = RoomBookings::pluck('room_detail_id')->toArray();

        // Lấy danh sách room_option_id riêng biệt theo từng bảng
        $roomOptionsForAvail = RoomOption::whereNotIn('id', $usedRoomAvail)->get();
        $roomOptionsForPolicies = RoomOption::whereNotIn('id', $usedRoomOptions)->get();
        $roomDetailsForBook = RoomDetails::whereNotIn('id', $usedRoomBook)->get();

        return view('admin.hotel_manager.index', compact(
            'hotelCategory', 'hotelRoom', 'created_by',
            'roomOptionsForAvail','roomOptionsForPolicies','roomDetailsForBook','roomDetails','roomOption'
        ));
    }

}
