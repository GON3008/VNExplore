<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelLocation;
use Illuminate\Http\Request;
use App\Models\ListCategories;
use App\Models\HotelCategories;
use Datatables;

class HotelCategories_Controller extends Controller
{
    const PATH_UPLOAD = 'HotelCategories';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $hotelCategories = HotelCategories::with('category', 'location', 'service')
                ->where('hotelCategory_deleted', 1)
                ->select('hotel_categories.*');

            return datatables()
                ->of($hotelCategories)
                ->addColumn('action', function ($hotelCategories) {
                    $button = '<button type="button" name="edit" id="' . $hotelCategories->id . '" class="edit-hotel btn btn-primary btn-sm">
                <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $hotelCategories->id . '" class="delete-hotel btn btn-danger btn-sm">
                <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->addColumn('hotelCategory_images', function ($hotelCategories) {
                    $images = json_decode($hotelCategories->hotelCategory_images);
                    $firstImage = $images[0] ?? 'default-image.jpg';
                    return '<img src="' . asset(self::PATH_UPLOAD . '/' . $firstImage) . '" width="70px" height="50px"/>';
                })
                ->editColumn('hotelCategory_status', function ($hotelCategories) {
                    return $hotelCategories->hotelCategory_status == 1 ? 'Active' : 'Inactive';
                })
                ->rawColumns(['action', 'hotelCategory_images', 'hotelCategory_status'])
                ->addIndexColumn()
                ->make(true);
        }
        // Pass both variables to the view
        return view('admin.categories.hotels.index');
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
        $hotelCategory_id = $request->hotelCategory_id;
        $rules = [
            'name' => ['required', 'max:100'],
            'hotelCategory_images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'category_id' => ['required'],
            'rating' => ['required'],
            'description' => ['nullable'],
        ];

        $request->validate($rules);

        $hotelCategories = HotelCategories::updateOrCreate([
            'id' => $hotelCategory_id,
        ],
            [
                'hotelCategory_name' => $request->name,
                'hotelCategory_description' => $request->description,
                'list_categories_id' => $request->category_id,
                'hotelCategory_rating' => $request->rating,
                'hotelCategory_status' => $request->status,
                'hotel_location_id' => $request->location_id,
                'hotel_service_id' => $request->service_id,
            ]);

        if ($request->hasFile('hotelCategory_images')) {
            $existingImages = json_decode($hotelCategories->hotelCategory_images, true) ?? [];

            foreach ($request->file('hotelCategory_images') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path(self::PATH_UPLOAD), $filename);
                $existingImages[] = $filename;
            }
            $hotelCategories->hotelCategory_images = json_encode($existingImages);
            $hotelCategories->save();
        }

        return response()->json($hotelCategories);
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
        $hotelCategories = HotelCategories::find($id);
        return response()->json($hotelCategories);
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
        $hotelCategories = HotelCategories::find($id);

        if(!$hotelCategories){
            return response()->json(['error' => 'Data Not Found'], 404);
        }

        $hotelCategories->hotelCategory_deleted = 0;
        $hotelCategories->save();

        return response()->json(['success'=>'Data Delete Successfully'],200);
    }
}
