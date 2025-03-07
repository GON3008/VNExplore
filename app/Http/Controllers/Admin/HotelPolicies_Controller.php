<?php

namespace App\Http\Controllers\Admin;

use App\Models\HotelPolicies;
use Illuminate\Http\Request;

class HotelPolicies_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $hotel_policies = HotelPolicies::with('hotel_room:id,room_name')
                ->where('hp_deleted', 1)
                ->select('hotel_policies.*');

            return datatables()
                ->of($hotel_policies)
                ->addColumn('action', function ($hotel_policies) {
                    $button = '<button type="button" name="edit" id="' . $hotel_policies->id . '" class="hp_edit btn btn-primary btn-sm">
                <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $hotel_policies->id . '" class="hp_delete btn btn-danger btn-sm">
                <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->editColumn('hp_is_free_cancellation', function ($hotel_policies) {
                    return $hotel_policies->hp_is_free_cancellation ? 'Free cancellation'
                        : 'No free cancellation';
                })
                ->editColumn('hp_allows_pets', function ($hotel_policies) {
                    return $hotel_policies->hp_allows_pets ? 'Yes'
                        : 'No';
                })
                ->editColumn('hp_allows_smoking', function ($hotel_policies) {
                    return $hotel_policies->hp_allows_smoking ? 'Yes'
                        : 'No';
                })
                ->editColumn('hp_is_child_friendly', function ($hotel_policies) {
                    return $hotel_policies->hp_is_child_friendly ? 'Yes'
                        : 'No';
                })
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
//            'hp_fee_cancellation_days' => ['required', 'numeric'],
            'hp_booking_fee' => ['required', 'numeric'],
        ];
        $request->validate($rule);

        $hotel_policies = HotelPolicies::updateOrCreate(
            ['id' => $hp_id],
            [
                'hp_cancellation_fee' => $request->hp_cancellation_fee,
                'hp_free_cancellation_days' => $request->hp_free_cancellation_days,
                'hp_booking_fee' => $request->hp_booking_fee,
                'hp_is_free_cancellation' => $request->hp_is_free_cancellation,
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
        return response()->json(['success' => 'Hotel Policies create successfully']);
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
            $hotel_policies = HotelPolicies::where('id', $id)->firstOrFail();
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
        $hotel_polices = HotelPolicies::findOrFail($id);
        $hotel_polices->update($request->all());
        return response()->json(['success' => 'Hotel Policies update Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hotel_policies = HotelPolicies::where('id', $id)->frist();
        if (!$hotel_policies) {
            return response()->json(['error' => 'Hotel Policies not found'], 404);
        }
        $hotel_policies->hp_deleted = 0;
        $hotel_policies->save();
        return response()->json(['success' => 'Hotel Policies delete successfully'], 200);
    }
}
