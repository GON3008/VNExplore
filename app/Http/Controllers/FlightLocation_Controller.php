<?php

namespace App\Http\Controllers;

use App\Models\FlightLocation;
use Illuminate\Http\Request;
use Datatables;

class FlightLocation_Controller extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $flightLocations= FlightLocation::where('deleted', 0)->select('flight_locations.*');
            return datatables()->of($flightLocations)
                ->addColumn('action', function ($flightLocations) {
                    $button = '<button type="button" name="edit" id="' . $flightLocations->id . '" class="edit-tour btn btn-primary btn-sm">
<i class="uil-edit"></i>
</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $flightLocations->id . '" class="delete-tour btn btn-danger btn-sm">
<i class=" uil-trash-alt"></i>
</button>';
                    return $button;
                })
//                ->editColumn('status', function ($flightLocations) {
//                    if ($flightLocations->status == 0) {
//                        $span = 'Active';
//                    } else {
//                        $span = 'Inactive';
//                    }
//                    return $span;
//                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $flightLocations = FlightLocation::all();
        return view('admin.locations.flight_location.index', compact('flightLocations'));
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
