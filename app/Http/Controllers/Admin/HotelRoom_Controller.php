<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelCategories;
use App\Models\HotelLocation;
use App\Models\HotelRooms;
use App\Models\HotelServices;
use Illuminate\Http\Request;

class HotelRoom_Controller extends Controller
{
    const PATH_UPLOAD = 'uploads/hotel_room/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $rooms = HotelRooms::with(['category','service','location'])
                ->where('room_deleted', 1)
                ->select('hotel_rooms.*');

            return datatables()
                ->of($rooms)
                ->addColumn('action', function ($rooms){
                    $button = '<button type="button" name="edit" id="' . $rooms->id . '" class="edit-hotel_room btn btn-primary btn-sm">
                <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $rooms->id . '" class="delete-hotel_room btn btn-danger btn-sm">
                <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->addColumn('room_images', function($rooms){
                    $images = json_decode($rooms->room_images);
                    $firstImage = $images[0] ?? 'default-image.jpg';
                    return '<img src="' . asset(self::PATH_UPLOAD . '/' . $firstImage) . '" width="70px" height="50px"';
                })
                ->editColumn('room_status', function ($rooms){
                    return $rooms->room_status == 1 ? 'Active' : 'Inactive';
                })
                ->rawColumns(['action', 'room_images', 'room_status'])
                ->addIndexColumn()
                ->make(true);
        }
        $hotelCategory = HotelCategories::all();
        $hotelService = HotelServices::all();
        $hotelLocation = HotelLocation::all();
        return view('admin.hotel_room.index', compact('hotelCategory', 'hotelService', 'hotelLocation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room_id = request()->room_id;
        $rule=[
            'room_name' => ['required', 'max:100'],
            'room_price' => ['required', 'max:100', 'regex:/^\d+(\.\d{1,2})?$/', 'numeric'],
            'room_discount' => ['required', 'max:100', 'regex:/^\d+(\.\d{1,2})?$/', 'numeric'],
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
