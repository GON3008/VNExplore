<?php

namespace App\Http\Controllers;

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
                    $images = explode(',', $hotelCategories->images);
                    $firstImage = $images[0] ?? 'default-image.jpg';
                    $imagePath = asset('HotelCategories/' . $firstImage);

                    return '<img src="' . $imagePath . '" width="50px" height="50px"/>';
                })
                ->editColumn('hotelCategory_status', function ($hotelCategories) {
                    return $hotelCategories->status == 0 ? 'Active' : 'Inactive';
                })
                ->rawColumns(['action', 'images'])
                ->addIndexColumn()
                ->make(true);
        }

        // Get the required data for the form
        $hotelLocations = HotelLocation::all();
        $listCategories = ListCategories::all();

        // Pass both variables to the view
        return view('admin.categories.hotels.index', compact( 'hotelLocations','listCategories'));
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
            'images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Thay đổi từ 'image' sang 'images.*' để xử lý nhiều ảnh
            'category_id' => ['required'],
            'rating' => ['required'],
            'description' => ['nullable'],
        ];

        $request->validate($rules);

        $hotelCategories = HotelCategories::updateOrCreate([
            'id' => $hotelCategory_id,
        ],
            [
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'rating' => $request->rating,
                'status' => $request->status,
            ]);

        // Kiểm tra nếu có ảnh được tải lên
        if ($request->hasFile('images')) {
            $images = [];

            foreach ($request->file('images') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path(self::PATH_UPLOAD), $filename);
                $images[] = $filename; // Lưu tên ảnh vào mảng
            }

            // Lưu tất cả các đường dẫn ảnh dưới dạng JSON hoặc mảng (tuỳ theo cách bạn lưu trữ trong database)
            $hotelCategories->images = json_encode($images); // Hoặc $hotelCategories->images = $images; nếu bạn lưu trữ dưới dạng array
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
