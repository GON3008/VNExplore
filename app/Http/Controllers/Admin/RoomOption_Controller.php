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
            $room_option = RoomOption::with(['hotel_room:id,room_name', 'hotel_category:id,hotelCategory_name', 'created_by_user:id,name'])
                ->where('ro_deleted', 1)
                ->select('room_options.*');

            return datatables()
                ->of($room_option)
                ->addColumn('action', function ($room_option) {
                    $button = '<button type="button" name="edit" id="' . $room_option->id . '" class="ro_edit btn btn-primary btn-sm">
                <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $room_option->id . '" class="ro_delete btn btn-danger btn-sm">
                <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->editColumn('ro_is_featured', function ($room_option) {
                    return $room_option->ro_is_featured ? 'Outstanding'
                        : 'Often';
                })
                ->editColumn('ro_is_refundable', function ($room_option) {
                    return $room_option->ro_is_refundable ? 'Refund'
                        : 'Unspeakable';
                })
                ->addIndexColumn()
                ->make(true);
        }
        $hotelRoom = HotelRooms::all();
        $hotelCategory = HotelCategories::all();
        $created_by = User::all();
        $bed_type = ['1 King bed', '1 Queen bed', '2 Single bed'];
        $ro_status = ['Available', 'Booked', 'Maintenance', 'Unavailable'];
        $ro_views = ['Sea view', 'City view', 'Garden view'];

        return view('admin.room_option.index', compact('hotelRoom', 'hotelCategory',
            'created_by', 'bed_type', 'ro_status', 'ro_views'));
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
            'ro_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
            'ro_discount' => ['nullable', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
            'ro_quantity' => ['required', 'integer', 'min:1'],
            'ro_max_guests' => ['nullable', 'integer', 'min:1'],
        ];

        $request->validate($rule);

        $room_option = RoomOption::updateOrCreate(
            ['id' => $ro_id],
            [
                'ro_price' => $request->ro_price,
                'ro_discount' => $request->ro_discount,
                'ro_quantity' => $request->ro_quantity,
                'ro_max_guests' => $request->ro_max_guests,
                'ro_extra_bed_price' => $request->ro_extra_bed_prie,
                'ro_area' => $request->ro_area,
                'ro_checkin_time' => $request->ro_checkin_time,
                'ro_checkout_time' => $request->ro_checkout_time,
                'ro_bed_type' => $request->ro_bed_type,
                'ro_status' => $request->ro_status,
                'ro_views' => $request->ro_views,
                'ro_is_refundable' => $request->ro_is_refundable,
                'ro_is_featured' => $request->ro_is_featured,
                'ro_hotel_category_id' => $request->ro_hotel_category_id,
                'ro_hotel_room_id' => $request->ro_hotel_room_id,
                'ro_created_by' => $request->ro_created_by,
            ]
        );
        $room_option->save();
        return response()->json(['success' => 'Room Option updated successfully.']);
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
        try {
            $room_option = RoomOption::where('id', $id)->firstOrFail();
            return response()->json($room_option);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Room Option not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $roomOption = RoomOption::findOrFail($id);
        $roomOption->update($request->all());
        return response()->json(['success' => 'Room Option updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room_option = RoomOption::where('id', $id)->first();

        if (!$room_option) {
            return response()->json(['error' => 'Room Option not found.'], 404);
        }

        $room_option->ro_deleted = 0;
        $room_option->save();
        return response()->json(['success' => 'Room Option deleted successfully.']);
    }

}
