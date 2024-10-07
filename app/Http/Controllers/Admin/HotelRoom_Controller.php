<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelRooms;
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
            $hotelRoom = HotelRooms::with('category','service','location')
                ->where('room_deleted', 1)
                ->select('hotel_rooms.*');

            return datatables()
                ->of($hotelRoom)
                ->addColumn('action', function ($hotelRoom){
                    $button = '<button type="button" name="edit" id="' . $hotelRoom->id . '" class="edit-hotel_room btn btn-primary btn-sm">
                <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $hotelRoom->id . '" class="delete-hotel_room btn btn-danger btn-sm">
                <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->addColumn('room_images', function($hotelRoom){
                    $images = json_decode($hotelRoom->room_images);
                    $firstImage = $images[0] ?? 'default-image.jpg';
                    return '<img src="' . asset(self::PATH_UPLOAD . '/' . $firstImage) . '" width="70px" height="50px"';
                })
                ->editColumn('room_status', function ($hotelRoom){
                    return $hotelRoom->room_status == 1 ? 'Active' : 'Inactive';
                })
                ->rawColumns(['action', 'room_images', 'room_status'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.hotel_room.index');
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
