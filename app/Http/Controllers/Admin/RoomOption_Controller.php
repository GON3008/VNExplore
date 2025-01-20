<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelCategories;
use App\Models\HotelRooms;
use App\Models\RoomOption;
use App\Models\User;
use Illuminate\Http\Request;

class RoomOption_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $room_option = RoomOption::with(['ro_room_id', 'ro_category_id', 'ro_user_id'])
                ->where('ro_deleted', 1)
                ->select('room_options.*');

            return datatables()
                ->of($room_option)
                ->addColumn('action', function ($room_option) {
                    $button = '<button type="button" name="edit" id="' . $room_option->ro_id . '" class="edit btn btn-primary btn-sm">
                <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $room_option->ro_id . '" class="delete btn btn-danger btn-sm">
                <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $hotelRoom = HotelRooms::all();
        $hotelCategory = HotelCategories::all();
        $created_by = User::all();
        $room_bed_type = ['1 king bed', '1 queen bed', '2 single bed'];
        $room_status = ['available', 'booked', 'maintenance', 'unavailable'];
        $room_view = ['sea view', 'city view', 'garden view'];

        return view('admin.room_option.index', compact('hotelRoom', 'hotelCategory',
            'created_by', 'room_bed_type', 'room_status', 'room_view'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ro_id = $request->ro_id;

        $rule = [
            'ro_price' => ['require', 'max:100', 'regex:/^\d+(\.\d{1,2})?$/', 'numeric'],
            'ro_discount' => ['max:100', 'regex:/^\d+(\.\d{1,2})?$/', 'numeric'],
            'ro_quantity' => ['require', 'integer','min:1'],
            'ro_max_guests' => ['integer', 'min:1'],
        ];

        $request->validate(($rule));

        $room_option = RoomOption::updateOrCreate(
            ['ro_id' => $ro_id],

            [
                'ro_price' => $request->ro_price,
                'ro_discount' => $request->ro_discount,
                'ro_bed_type' => $request->ro_bed_type,
                'ro_quantity' => $request->ro_quantity,
                'ro_description' => $request->ro_description,
                'ro_status' => $request->ro_status,
                'ro_max_guests' => $request->ro_max_guests,
                'ro_extra_bed_price' => $request->ro_extra_bed_price,
                'ro_is_refundable' => $request->ro_is_refundable,
                'ro_cancellation_policy' => $request->ro_cancellation_policy,
                'ro_checkin_time' => $request->ro_checkin_time,
                'ro_checkout_time' => $request->ro_checkout_time,
                'ro_is_featured' => $request->ro_is_featured,
                'ro_views' => $request->ro_views,
                'ro_area' => $request->ro_area,
                'ro_hotel_room_id' => $request->ro_hotel_room_id,
                'ro_hotel_category_id' => $request->ro_hotel_category_id,
                'ro_created_by' => $request->ro_created_by,
                ]
            );

        return response()->json(['success' => 'Room Option saved successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room_option = RoomOption::find($id);
        return response()->json($room_option);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room_option = RoomOption::find($id);

        if (!$room_option) {
            return response()->json(['error' => 'Room Option not found.'], 404);
        }

        $room_option->ro_deleted = 0;
        $room_option->save();
        return response()->json(['success' => 'Room Option deleted successfully.']);
    }
}
