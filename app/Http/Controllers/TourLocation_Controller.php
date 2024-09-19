<?php

namespace App\Http\Controllers;

use App\Models\TourLocation;
use Illuminate\Http\Request;
use Datatables;

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
        $tourLocation_id = $request->tourLocation_id;

        $rules = [
            'tour_country' => ['required', 'max:100'],
            'tour_city' => ['required', 'max:100'],
            'tour_district' => ['required', 'max:100'],
            'tour_ward' => ['required', 'max:100'],
        ];

        $uniqueFields = ['tour_country', 'tour_city', 'tour_district', 'tour_ward'];
        foreach ($uniqueFields as $field) {
            if (!$tourLocation_id || TourLocation::where('id', $tourLocation_id)->value($field) !== $request->$field) {
                $rules[$field][] = 'unique:tour_locations,' . $field;
            }
        }


        $request->validate($rules);

        $tourLocaions = TourLocation::updateOrCreate(
            ['id' => $tourLocation_id],
            [
                'tour_country' => $request->tour_country,
                'tour_city' => $request->tour_city,
                'tour_district' => $request->tour_district,
                'tour_ward' => $request->tour_ward,
            ]
        );

        return response()->json($tourLocaions);
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
        $tourLocations = TourLocation::find($id);

        return response()->json($tourLocations);
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
        $tourLocations = TourLocation::find($id);

        if(!$tourLocations){
            return response()->json(['error' => 'Data Not Found'], 404);
        }

        $tourLocations->deleted = 1;
        $tourLocations->save();
        return response()->json(['success' => 'Data Delete Successfully'], 200);
    }
}
