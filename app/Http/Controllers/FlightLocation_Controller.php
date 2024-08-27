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
                    $button = '<button type="button" name="edit" id="' . $flightLocations->id . '" class="edit-flight btn btn-primary btn-sm">
<i class="uil-edit"></i>
</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $flightLocations->id . '" class="delete-flight btn btn-danger btn-sm">
<i class=" uil-trash-alt"></i>
</button>';
                    return $button;
                })
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
        $flightLocation_id = $request->flightLocation_id;

        $rules = [
            'flight_country' => ['required', 'max:100'],
            'flight_city' => ['required', 'max:100', 'unique:flight_locations,flight_city,' . $flightLocation_id],
            'flight_district' => ['required', 'max:100'],
            'flight_ward' => ['required', 'max:100'],
            'symbol' => ['required', 'max:100', 'unique:flight_locations,symbol,' . $flightLocation_id],
        ];

        if (!$flightLocation_id || FlightLocation::where('id', $flightLocation_id)->value('flight_city') !== $request->flight_city) {
            $rules['flight_city'][] = 'unique:flight_locations,flight_city';
        }

        if (!$flightLocation_id || FlightLocation::where('id', $flightLocation_id)->value('symbol') !== $request->symbol) {
            $rules['symbol'][] = 'unique:flight_locations,symbol';
        }

        $request->validate($rules);



        $request->validate($rules);

        $flightLocaions = FlightLocation::updateOrCreate(
            ['id' => $flightLocation_id],
            [
                'flight_country' => $request->flight_country,
                'flight_city' => $request->flight_city,
                'flight_district' => $request->flight_district,
                'flight_ward' => $request->flight_ward,
                'symbol' => $request->symbol,
            ]
        );

        return response()->json($flightLocaions);
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
        $flightLocations = FlightLocation::find($id);
        return response()->json($flightLocations);
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
        $flightLocations = FlightLocation::find($id);

        if(!$flightLocations){
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        $flightLocations->deleted = 1;
        $flightLocations->save();

        return response()->json(['success' => 'Data Delete Successfully'], 200);
    }
}
