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
            'ro_max_guests' => ['require', 'integer', 'min:1'],
        ];
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
        //
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
        //
    }
}
