<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel_policies;
use App\Models\HotelRooms;
use Illuminate\Http\Request;

class HotelPoicies_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $hotel_policies = Hotel_policies::with('hp_room_id')
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
        $hotelRoom = HotelRooms::all();
        return view('admin.hotel_manager.hotel_policies.index', compact('hotelRoom'));
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
