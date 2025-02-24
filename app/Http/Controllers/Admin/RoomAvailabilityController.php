<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomAvailability;
use App\Models\RoomOption;
use http\Env\Response;
use Illuminate\Http\Request;

class RoomAvailabilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $room_availability = RoomAvailability::with(['room_option:id'])
                ->select('room_availabilities.*');

            return datatables()
                ->of($room_availability)
                ->addColumn('action', function ($room_availability) {
                    $button = '<button type="button" name="edit" id="' . $room_availability->id . '" class="ra_edit btn btn-primary btn-sm">
                <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $room_availability->id . '" class="ra_delete btn btn-danger btn-sm">
                <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.room_option.index');
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
        $ra_id = $request->id;
        $room_availability = RoomAvailability::updateOrCreate(
            ['id' => $ra_id],
            [
                'room_option_id' => $request->room_option_id,
                'available_rooms' => $request->available_rooms,
                'booked_rooms' => $request->booked_rooms,
                'maintenance_rooms' => $request->maintenance_rooms,
                'unavailable_rooms' => $request->unavailable_rooms,
                'date' => $request->date,
            ]
        );
        $room_availability->save();
        return response()->json(['success' => 'Room Availability create successfully.']);
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
            $room_availability = RoomAvailability::where('id', $id)->firstOrFail();
            return response()->json($room_availability);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Room Availability not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room_availability = RoomAvailability::findOrFail($id);
        $room_availability->update($request->all());
        return response()->json(['success' => 'Room Availability updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room_availability = RoomAvailability::where('id', $id)->first();
        if(!$room_availability){
            return response()->json(['error' => 'Room Availability not found'], 404);
        }
        $room_availability->deleted();
        return response()->json(['success' => 'Room Availability deleted successfully']);
    }

    public function getRoomOption($id)
    {
        $roomOption = RoomOption::find($id);

        if ($roomOption) {
            return response()->json(['ro_quantity' => $roomOption->ro_quantity]);
        }
        return response()->json(['error' => 'Room option not found'], 404);
    }
}
