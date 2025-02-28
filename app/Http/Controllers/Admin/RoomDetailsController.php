<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomBookings;
use App\Models\RoomDetails;
use Illuminate\Http\Request;
use Twilio\TwiML\Video\Room;

class RoomDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $room_details = RoomDetails::with(['room_option:id'])
                ->select('room_details.*');

            return datatables()
                ->of($room_details)
                ->addColumn('action', function ($room_details) {
                    $button = '<button type="button" name="edit" id="' . $room_details->id . '" class="rd_edit btn btn-primary btn-sm">
                <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $room_details->id . '" class="rd_delete btn btn-danger btn-sm">
                <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $rd_status = ['Available', 'Booked', 'Maintenance', 'Unavailable'];
        return view('admin.hotel_manager.room_details.index', compact('rd_status'));
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
        $rd_id = $request->id;

        $room_details = RoomDetails::updateOrCreate(
            ['id' => $rd_id],
            [
                'rd_number' => $request->room_number,
                'rd_option' => $request->room_option_id,
                'rd_status' => $request->status,
            ]
        );
        $room_details->save();
        return response()->json(['success' => 'Room details create successfully']);
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
            $room_details = RoomDetails::where('id', $id)->firstOrFail();
            return response()->json($room_details);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Room details not found.'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room_details = RoomDetails::findOrFail($id);
        $room_details->update($request->all());
        return response()->json(['success' => 'Room details update successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room_details = RoomDetails::where('id', $id)->first();
        if (!$room_details) {
            return response()->json(['error' => 'Room details not found'], 404);
        }
        $room_details->rd_deleted = 0;
        $room_details->save();
        return response()->json(['success' => 'Room details delete successfully']);
    }
}
