<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel_policies;
use App\Models\HotelRooms;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

class HotelPolicies_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $hotel_policies = Hotel_policies::with('hotel_room:id,room_name')
                ->where('hp_deleted', 1)
                ->select('hotel_policies.*');

            return datatables()
                ->of($hotel_policies)
                ->addColumn('action', function ($hotel_policies) {
                    $button = '<button type="button" name="edit" id="' . $hotel_policies->hp_id . '" class="edit btn btn-primary btn-sm">
                <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $hotel_policies->hp_id . '" class="delete btn btn-danger btn-sm">
                <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.hotel_manager.hotel_policies.index');
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
        $hp_id = $request->hp_id;
        $rule = [
            'hp_cancellation_fee' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/', 'min:0'],
            'hp_fee_cancellation_day' => ['required', 'numeric'],
            'hp_booking_fee' => ['required', 'numeric'],
        ];
        $request->validate($rule);

        $hotel_policies = Hotel_policies::updateOrCreate(
            ['id' => $hp_id],
            [
                'hp_cancellation_fee' => $request->hp_cancellation_fee,
                'hp_fee_cancellation_day' => $request->hp_fee_cancellation_day,
                'hp_booking_fee' => $request->hp_booking_fee,
                'hp_is_fee_cancellation' => $request->hp_is_fee_cancellation,
                'hp_checkin_time' => $request->hp_checkin_time,
                'hp_checkout_time' => $request->hp_checkout_time,
                'hp_policy_notes' => $request->hp_policy_notes,
                'hp_late_checkout_fee' => $request->hp_late_checkout_fee,
                'hp_late_checkin_fee' => $request->hp_late_checkin_fee,
                'hp_allows_pet' => $request->hp_allows_pet,
                'hp_is_child_friendly' => $request->hp_is_child_friendly,
                'hp_allows_smoking' => $request->hp_allows_smoking,
                'hp_hotel_room_id' => $request->hp_hotel_room_id,
            ],
        );
        $hotel_policies->save();
        return response()->json(['success', 'Hotel Policies create successfully']);
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
            $hotel_policies = Hotel_policies::where('id', $id)->firstOrFail();
            return response()->json($hotel_policies);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Hotel Policies not found.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hotel_polices = Hotel_policies::findOrFail($id);
        $hotel_polices->update($request->all());
        return response()->json(['success' => 'Hotel Policies update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel_policies = Hotel_policies::where('id', $id)->frist();
        if (!$hotel_policies) {
            return response()->json(['error' => 'Hotel Policies not found'], 404);
        }
        $hotel_policies->hp_deleted = 0;
        $hotel_policies->save();
        return response()->json(['success' => 'Hotel Policies delete successfully'], 200);
    }
}
