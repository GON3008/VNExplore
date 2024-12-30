<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelCategories;
use App\Models\HotelLocation;
use App\Models\HotelRooms;
use App\Models\RoomType;
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
        if (request()->ajax()) {
            $rooms = HotelRooms::with(['category', 'service', 'location', 'roomType'])
                ->where('room_deleted', 1)
                ->select('hotel_rooms.*');

            return datatables()
                ->of($rooms)
                ->addColumn('action', function ($rooms) {
                    $button = '<button type="button" name="edit" id="' . $rooms->id . '" class="edit btn btn-primary btn-sm">
                <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $rooms->id . '" class="delete btn btn-danger btn-sm">
                <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->addColumn('room_images', function ($rooms) {
                    $images = json_decode($rooms->room_images);
                    $firstImage = $images[0] ?? 'default-image.jpg';
                    return '<img src="' . asset(self::PATH_UPLOAD . '/' . $firstImage) . '" width="70px" height="50px"';
                })
                ->rawColumns(['action', 'room_images', 'room_status'])
                ->addIndexColumn()
                ->make(true);
        }
        $hotelCategory = HotelCategories::all();
        $hotelService = HotelServices::all();
        $hotelLocation = HotelLocation::all();
        $roomType = RoomType::all();
        $bed_type = ['King', 'Queen', 'Twin'];
        $guests = ['1','2','3','4','5','6','7','8','9','10'];
        $availability = ['Available', 'Booked', 'Maintenance'];
        $clear = ['Cleaned', 'Not Cleaned', 'In Progress'];
        return view('admin.hotel_room.index', compact( 'hotelCategory', 'hotelService',
            'hotelLocation', 'roomType', 'bed_type', 'availability', 'clear','guests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room_id = $request->room_id;

        $rule = [
            'room_name' => ['required', 'max:100', 'unique:hotel_rooms,room_name,' . $room_id], // Use unique table-column properly
            'room_price' => ['required', 'max:100', 'regex:/^\d+(\.\d{1,2})?$/', 'numeric'],
            'room_discount' => ['required', 'max:100', 'regex:/^\d+(\.\d{1,2})?$/', 'numeric'],
            'room_number' => ['required', 'unique:hotel_rooms,room_number,' . $room_id],
        ];

        $request->validate($rule);

        // Save or update hotel room data
        $hotelRooms = HotelRooms::updateOrCreate(
            ['id' => $room_id], // Match by room ID
            [
                'room_number' => $request->room_number,
                'room_name' => $request->room_name,
                'room_price' => $request->room_price,
                'room_discount' => $request->room_discount,
                'room_description' => $request->room_description,
                'room_rating' => $request->room_rating,
                'guests' => $request->guests,
                'bed_type' => $request->bed_type,
                'availability_status' => $request->availability_status,
                'cleaning_status' => $request->cleaning_status,
                'hotel_category_id' => $request->hotel_category_id,
                'hotel_service_id' => $request->hotel_service_id,
                'hotel_location_id' => $request->hotel_location_id,
                'room_type_id' => $request->room_type_id,
            ]
        );

        // Handle image upload and attach to hotel rooms
        if ($request->hasFile('room_images')) {
            $images = [];
            foreach ($request->file('room_images') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path(self::PATH_UPLOAD), $filename);
                $images[] = $filename;
            }
            $hotelRooms->room_images = json_encode($images);
        }else{
            $hotelRooms->room_images = json_encode([]);
        }
        $hotelRooms->save();

        return response()->json($hotelRooms);
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
        $hotelRooms = HotelRooms::find($id);
        return response()->json($hotelRooms);
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
        $hotelRooms = HotelRooms::find($id);

        if (!$hotelRooms) {
            return response()->json(['message' => 'Hotel Room Not Found'], 404);
        }

        $hotelRooms->room_deleted = 0;
        $hotelRooms->save();

        return response()->json(['message' => 'Hotel Room Delete Successfully']);
    }
}
