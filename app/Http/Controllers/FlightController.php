<?php

namespace App\Http\Controllers;

use App\Models\FlightCategories;
use App\Models\FlightLocation;
use Illuminate\Http\Request;
use App\Models\Flight;
use Datatables;

class FlightController extends Controller
{
    const PATH_UPLOAD = 'flights';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()){
            $flights = Flight::with('flightCategories','locationDeparture','locationArrival')->where('deleted', 0)->select('flights.*');
            return datatables()->of($flights)
                ->addColumn('action', function ($flights) {
                    $button = '<button type="button" name="edit" id="' . $flights->id . '" class="edit btn btn-primary btn-sm">
                    <i class="uil-edit"></i>
                    </button>';
                    $button .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $flights->id . '" class="delete btn btn-danger btn-sm">
                    <i class=" uil-trash-alt"></i>
                    </button>';
                    return $button;
                })
                ->addColumn('image', function ($flights) {
                    $imagePath = asset('flights/' . $flights->image);
                    $image = '<img src="' . $imagePath . '" width="50px" height="50px"/>';
                    return $image;
                })
                ->rawColumns(['action','image'])
                ->addIndexColumn()
                ->make(true);
        }
        $flightCategories= FlightCategories::all();
        $flightLocations= FlightLocation::all();
        return view('admin.flights.index', compact('flightCategories','flightLocations'));
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
        $flightData = [
            'name' => $request->name,
            'price' => $request->price,
            'price_discount' => $request->price_discount,
            'flight_number' => $request->flight_number,
            'description' => $request->description,
            'departure_date' => $request->departure_date,
            'return_date' => $request->return_date,
            'departure_time' => $request->departure_time,
            'return_time' => $request->return_time,
            'flight_code' => $request->flight_code,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'location_departure_id' => $request->location_departure_id,
            'location_arrival_id' => $request->location_arrival_id,
        ];

        $flight = Flight::updateOrCreate([
            'id' => $request->flight_id,
        ], $flightData);

        return response()->json($flight, 200);
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
        $flight = Flight::find($id);

        return response()->json($flight, 200);
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
        $flight = Flight::find($id);

        if(!$flight){
            return response()->json(['error' => 'Flight not found'], 404);
        }
        $flight->deleted = 1;
        $flight->save();

        return response()->json(['success' => 'Flight deleted successfully'], 200);
    }
}
