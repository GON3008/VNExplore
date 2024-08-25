<?php

namespace App\Http\Controllers;

use App\Models\TourLocation;
use Illuminate\Http\Request;

class TourLocation_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $tourLocations= TourLocation::where('deleted', 0)->select('tour_locations.*');
            return datatables()->of($tourLocations)
                ->addColumn('action', function ($tourLocations) {
                    $button = '<button type="button" name="edit" id="' . $tourLocations->id . '" class="edit-tour btn btn-primary btn-sm">
<i class="uil-edit"></i>
</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $tourLocations->id . '" class="delete-tour btn btn-danger btn-sm">
<i class=" uil-trash-alt"></i>
</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $tourLocations = TourLocation::all();
        return view('admin.locations.tour_location.index', compact('tourLocations'));
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
