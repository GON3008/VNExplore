<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HotelLocation;
use Datatables;

class HotelLocation_Controller extends Controller
{
    const PATH_UPLOAD = 'uploads/HotelLocation_img';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $hotelLocations = HotelLocation::where('deleted', 1)->select('hotel_locations.*');

            return datatables()->of($hotelLocations)
                ->addColumn('action', function ($hotelLocations) {
                    $button = '<button type="button" name="edit" id="' . $hotelLocations->id . '" class="edit-hotel btn btn-primary btn-sm">
                            <i class="uil-edit"></i>
                        </button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $hotelLocations->id . '" class="delete-hotel btn btn-danger btn-sm">
                            <i class="uil-trash-alt"></i>
                        </button>';
                    return $button;
                })
                ->addColumn('hotelLocation_img', function ($hotelLocations) {
                    $images = json_decode($hotelLocations->hotelLocation_img, true);
                    $firstImage = !empty($images) ? $images[0] : null;

                    if ($firstImage) {
                        $imagePath = asset('uploads/HotelLocation_img/' . $firstImage);
                        return '<img src="' . $imagePath . '" width="50px" height="50px"/>';
                    }
                    return 'No Image';
                })
                ->rawColumns(['action', 'hotelLocation_img'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.locations.hotel_location.index');
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
        $hotelLocation_id = $request->hotelLocation_id;

        $rules = [
            'hotel_country' => ['required', 'max:100'],
            'hotel_city' => ['required', 'max:100'],
            'hotel_district' => ['required', 'max:100'],
            'hotel_ward' => ['required', 'max:100'],
            'hotelLocation_img.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg']
        ];

        $uniqueFields = ['hotel_country', 'hotel_city', 'hotel_district', 'hotel_ward'];
        foreach ($uniqueFields as $field) {
            if (!$hotelLocation_id || HotelLocation::where('id', $hotelLocation_id)->value($field) !== $request->$field) {
                $rules[$field][] = 'unique:hotel_locations,' . $field;
            }
        }

        $validatedData = $request->validate($rules);

        $hotelLocations = HotelLocation::updateOrCreate(
            ['id' => $hotelLocation_id],
            $validatedData
        );

        if ($request->hasFile('hotelLocation_img')) {
            $images = [];
            foreach ($request->file('hotelLocation_img') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path(self::PATH_UPLOAD), $filename);
                $images[] = $filename;
            }
            $hotelLocations->hotelLocation_img = json_encode($images);
        }

        $hotelLocations->save();
        return response()->json($hotelLocations);
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
        $hotelLocation = HotelLocation::find($id);
        return response()->json($hotelLocation);
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
        $hotelLocation = HotelLocation::find($id);
        if (!$hotelLocation) {
            return response()->json(['message' => 'Hotel Location not found'], 404);
        }
        $hotelLocation->deleted = 1;
        $hotelLocation->save();
        return response()->json(['message' => 'Hotel Location deleted successfully'], 200);
    }
}
