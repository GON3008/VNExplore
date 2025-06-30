<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Admin\Controller;
use App\Models\HotelCategories;
use App\Models\HotelLocation;
use App\Models\HotelRooms;
use App\Models\RoomBookings;
use App\Models\RoomOption;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
//    public function RoomDetailsShow(Request $request, $hotel_category_id)
//    {
//        $hotelCategory = HotelCategories::findOrFail($hotel_category_id);
//        $checkinDate = $request->input('checkin_date');
//        $checkoutDate = $request->input('checkout_date');
//
//        // Lấy danh sách phòng kèm theo room options dựa trên ngày checkin, checkout và ro_quantity
//        $hotelRooms = HotelRooms::with([
//            'roomOptions' => function ($query) use ($checkinDate, $checkoutDate) {
//                $query->where('ro_deleted', 1)
//                    ->where('ro_quantity', '>', 0) // Chỉ hiển thị room option có ro_quantity > 0
//                    ->whereNotIn('id', function ($q) use ($checkinDate, $checkoutDate) {
//                        $q->select('room_option_id')
//                            ->from('room_bookings')
//                            ->whereIn('status', ['Booked', 'Checked-in'])
//                            ->where(function ($q) use ($checkinDate, $checkoutDate) {
//                                $q->where('checkin_date', '<=', $checkoutDate)
//                                    ->where('checkout_date', '>=', $checkinDate);
//                            });
//                    })
//                    ->with('cancellationPolicies', 'availability');
//            }
//        ])->where('hotel_category_id', $hotel_category_id)->get();
//
//        $slug = Str::slug($hotelCategory->hotelCategory_name ?? $hotelCategory->id);
//
//        return view('clients.hotels.hotel_detail', compact('hotelCategory', 'hotelRooms', 'slug', 'checkinDate', 'checkoutDate'));
//    }

    public function RoomDetailsShow(Request $request, $hotel_category_id)
    {
        $hotelCategory = HotelCategories::findOrFail($hotel_category_id);
        $checkinDate = $request->input('checkin_date');
        $checkoutDate = $request->input('checkout_date');

        // Validate and format dates
        try {
            $checkinDate = Carbon::parse($checkinDate)->format('Y-m-d');
            $checkoutDate = Carbon::parse($checkoutDate)->format('Y-m-d');
        } catch (\Exception $e) {
            return back()->withErrors(['date' => 'Invalid date format']);
        }

        // Lấy danh sách phòng kèm theo room options dựa trên ngày checkin, checkout và ro_quantity
        $hotelRooms = HotelRooms::with([
            'roomOptions' => function ($query) use ($checkinDate, $checkoutDate) {
                $query->where('ro_deleted', '=', 1) // Fixed: added explicit operator
                ->where('ro_quantity', '>', 0) // Chỉ hiển thị room option có ro_quantity > 0
                ->whereNotIn('id', function ($q) use ($checkinDate, $checkoutDate) {
                    $q->select('room_option_id')
                        ->from('room_bookings')
                        ->whereIn('status', ['Booked', 'Checked-in'])
                        ->where(function ($q) use ($checkinDate, $checkoutDate) {
                            $q->whereDate('checkin_date', '<=', $checkoutDate)
                                ->whereDate('checkout_date', '>=', $checkinDate);
                        });
                })
                    ->with('cancellationPolicies', 'availability');
            }
        ])->where('hotel_category_id', $hotel_category_id)->get();

        $slug = Str::slug($hotelCategory->hotelCategory_name ?? $hotelCategory->id);

        return view('clients.hotels.hotel_detail', compact('hotelCategory', 'hotelRooms', 'slug', 'checkinDate', 'checkoutDate'));
    }

    public function bookRoom(Request $request)
    {
        $request->validate([
            'room_option_id' => 'required|exists:room_options,id',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date|after:checkin_date',
        ]);

        $roomOption = RoomOption::findOrFail($request->room_option_id);

        // Kiểm tra số lượng còn lại
        if ($roomOption->ro_quantity <= 0) {
            return back()->with('error', 'Phòng này đã hết chỗ!');
        }

        // Tạo booking mới
        RoomBookings::create([
            'room_option_id' => $roomOption->id,
            'checkin_date' => $request->checkin_date,
            'checkout_date' => $request->checkout_date,
            'status' => 'Booked'
        ]);

        // Giảm số lượng phòng
        $roomOption->decrement('ro_quantity');

        return back()->with('success', 'Đặt phòng thành công!');
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

    public function searchRoomOption(Request $request, $hotel_category_id) {
        $checkinDate = $request->input('checkin_date');
        $checkoutDate = $request->input('checkout_date');

        // Lấy thông tin hotel_category
        $hotelCategory = HotelCategories::findOrFail($hotel_category_id);

        // Lấy danh sách Hotel Rooms của Hotel Category
        $hotelRooms = HotelRooms::where('hotel_category_id', $hotel_category_id)->get();

        // Tìm room_option trống trong khoảng ngày chọn của hotel_category
        $roomOptions = RoomOption::join('hotel_rooms', 'room_options.ro_hotel_room_id', '=', 'hotel_rooms.id')
            ->where('hotel_rooms.hotel_category_id', $hotel_category_id)
            ->where('room_options.ro_deleted', 1) // Thêm điều kiện ro_deleted = 1
            ->whereNotIn('room_options.id', function ($query) use ($checkinDate, $checkoutDate) {
                $query->select('room_option_id')
                    ->from('room_bookings')
                    ->whereIn('status', ['Booked', 'Checked-in'])
                    ->where(function ($q) use ($checkinDate, $checkoutDate) {
                        $q->where('checkin_date', '<=', $checkoutDate)
                            ->where('checkout_date', '>=', $checkinDate);
                    });
            })
            ->select('room_options.*', 'hotel_rooms.id as hotel_room_id') // Lấy thêm id của Hotel Room
            ->orderBy('hotel_rooms.id')
            ->orderBy('room_options.id')
            ->get();

        return view('clients.hotels.hotel_detail', compact('roomOptions', 'hotelCategory', 'checkinDate', 'checkoutDate', 'hotelRooms'));
    }

}
