<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Admin\Controller;
use App\Models\HotelCategories;
use App\Models\HotelLocation;
use App\Models\HotelRooms;
use App\Models\RoomOption;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HotelController extends Controller
{
//    public function index()
//    {
//        $data = HotelCategories::query()
//            ->with('category', 'service', 'rooms')
//            ->where('hotelCategory_deleted', 1)
//            ->paginate(20);
//        $vouchers = Voucher::where('deleted', 1)->paginate(5);
//        $hotelLocations = HotelLocation::where('deleted', 1)->paginate(20);
//        return view('clients.hotels.hotel_list', compact('data', 'vouchers', 'hotelLocations'));
//    }

    public function index()
    {
        $data = HotelCategories::query()
            ->with('category', 'service', 'rooms')
            ->where('hotelCategory_deleted', 1)
            ->orderByDesc('id')
            ->paginate(20);

        $vouchers = Voucher::where('deleted', 1)->orderByDesc('id')->paginate(5);
        $hotelLocations = HotelLocation::where('deleted', 1)->orderByDesc('id')->paginate(20);

        return view('clients.hotels.hotel_list', compact('data', 'vouchers', 'hotelLocations'));
    }


//    public function RoomDetailsShow($hotel_category_id)
//    {
//        $hotelCategory = HotelCategories::findOrFail($hotel_category_id);
//
//        $hotelRooms = HotelRooms::with([
//            'roomOptions' => function ($query) {
//                $query->where('ro_deleted', 1) // Lọc roomOptions có ro_deleted = 1
//                ->with('cancellationPolicies', 'availability'); // Lấy cancellationPolicies của roomOptions
//            }
//        ])->where('hotel_category_id', $hotel_category_id)->get();
//
//        return view('clients.hotels.hotel_detail', compact('hotelCategory', 'hotelRooms'));
//    }

    public function RoomDetailsShow($hotel_category_id)
    {
        $hotelCategory = HotelCategories::findOrFail($hotel_category_id);
        $hotelRooms = HotelRooms::with([
            'roomOptions' => function ($query) {
                $query->where('ro_deleted', 1)->with('cancellationPolicies', 'availability');
            }
        ])->where('hotel_category_id', $hotel_category_id)->get();

        return view('clients.hotels.hotel_detail', compact('hotelCategory', 'hotelRooms'));
    }

    public function RoomBooking(Request $request)
    {
        $ro_id = $request->input('ro_id');

        if (!$ro_id) {
            return redirect()->back()->with('error', 'Please select a room first.');
        }

        // Lưu vào Session để tránh lộ trên URL
        session(['ro_id' => $ro_id]);

        $roomOption = RoomOption::with('hotel_room')->findOrFail($ro_id);
        $roomBooking = $roomOption->hotel_room;

        return view('clients.Booking_payment.booking_page1', compact('roomOption', 'roomBooking'));
    }

    public function BookingStep2()
    {
        $ro_id = session('ro_id');

        if (!$ro_id) {
            return redirect()->route('booking.page1')->with('error', 'Room selection is required.');
        }

        $roomOption = RoomOption::with('hotel_room')->findOrFail($ro_id);

        return view('clients.Booking_payment.booking_page2', compact('roomOption'));
    }

    public function BookingStep3(Request $request)
    {
        $ro_id = session('ro_id');

        if (!$ro_id) {
            return redirect()->route('booking.page1')->with('error', 'Room selection is required.');
        }

        $roomOption = RoomOption::with('hotel_room')->findOrFail($ro_id);

        // Lưu thông tin vào session
        session([
            'total_price' => $roomOption->ro_discount * 1.1, // Tính 10% thuế
        ]);

        return view('clients.Booking_payment.booking_page3', compact('roomOption'));
    }

    public function searchRooms(Request $request) {
        $hotel = HotelRooms::find($request->id);

        $rooms = $hotel->rooms()->whereHas('roomOptions', function ($query) use ($request) {
            $query->where('ro_max_guests', '>=', $request->guests);
        })->get();

        return view('clients.hotels.hotel_detail', compact('hotel', 'rooms'));
    }


}
