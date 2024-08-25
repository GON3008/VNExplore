<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlightCategories;
use Datatables;
use function Pest\Laravel\json;

class FlightCategories_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $flightCategories = FlightCategories::where('deleted', 0)->select('flight_categories.*');
            return datatables()->of($flightCategories)
                ->addColumn('action', function ($flightCategories) {
                    $button = '<button type="button" name="edit" id="' . $flightCategories->id . '" class="edit-flight btn btn-primary btn-sm">
<i class="uil-edit"></i>
</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $flightCategories->id . '" class="delete-flight btn btn-danger btn-sm">
<i class=" uil-trash-alt"></i>
</button>';
                    return $button;
                })
                ->editColumn('status', function ($flightCategories) {
                    if ($flightCategories->status == 0) {
                        $span = 'Active';
                    } else {
                        $span = 'Inactive';
                    }
                    return $span;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $flightCategories = FlightCategories::all();
        return view('admin.categories.flights.index', compact('flightCategories'));
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
        $flightCategory_id = $request->flightCategory_id;
        $request->validate([
            'name' => ['required', 'max:100', 'unique:flight_categories'],
            'description' => ['nullable'],
        ]);

        $flightCategories = FlightCategories::UpdateOrCreate([
            'id' => $flightCategory_id,
        ],
            [
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->is_active,
        ]);

        return response()->json($flightCategories);
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
        $flightCategories = FlightCategories::find($id);
        return response()->json($flightCategories);
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
        $flightCategories = FlightCategories::find($id);
        if (!$flightCategories){
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        $flightCategories->deleted = 1;
        $flightCategories->save();
        return response()->json(['success' => 'Data Deleted Successfully'], 200);
    }
}
