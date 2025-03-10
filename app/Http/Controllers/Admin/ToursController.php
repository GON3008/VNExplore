<?php

namespace App\Http\Controllers\Admin;

use App\Models\Galleries_tour;
use App\Models\TourCategories;
use App\Models\Tours;
use Datatables;
use Illuminate\Http\Request;

class ToursController extends Controller
{

    const PATH_UPLOAD = 'tours';

    const PATH_GALLERIES = 'galleries';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $tours = Tours::with('category')->where('deleted', 0)->select('tours.*');
            return datatables()->of($tours)
                ->addColumn('action', function ($tours) {
                    $button = '<button type="button" name="edit" id="' . $tours->id . '" class="edit btn btn-primary btn-sm">
                    <i class="uil-edit"></i>
                    </button>';
                    $button .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $tours->id . '" class="delete btn btn-danger btn-sm">
                    <i class=" uil-trash-alt"></i>
                    </button>';
                    return $button;
                })
                ->rawColumns(['action','image'])
                ->addColumn('image', function ($tours) {
                    $imagePath = asset('tours/' . $tours->image);
                    $image = '<img src="' . $imagePath . '" width="50px" height="50px"/>';
                    return $image;
                })
                ->addIndexColumn()
                ->make(true);
        }
        $categories = TourCategories::all();
        return view('admin.tours.index', compact('categories'));
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
        $request->validate([
            'name' => 'required|unique:tours,name,' . $request->tour_id . '|max:100',
            'description' => ['nullable'],
            'category_id' => ['required'],
            'price' => ['required', 'numeric'],
            'vehicle' => ['required', 'string'],
            'departure_date' => ['required', 'date'],
            'return_date' => ['required', 'date'],
            'departure' => ['required', 'string'],
            'tour_time' => ['nullable', 'string'],
            'tour_to' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'slug' => ['nullable', 'string'],
        ]);

        $tourData = [
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'vehicle' => $request->vehicle,
            'departure_date' => $request->departure_date,
            'return_date' => $request->return_date,
            'departure' => $request->departure,
            'tour_time' => $request->tour_time,
            'tour_to' => $request->tour_to,
            'quantity' => $request->quantity,
            'deleted' => 0,
            'slug' => $request->slug,
            'tour_code' => $request->tour_code,
        ];


        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(self::PATH_UPLOAD), $filename);
            $tourData['image'] = $filename;
        }

        $tour = Tours::updateOrCreate([
            'id' => $request->tour_id,
        ], $tourData);

        // Handle gallery images upload
        if ($request->hasFile('galleries')) {
            $images = $request->file('galleries');
            foreach ($images as $image) {
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path(self::PATH_GALLERIES), $filename);

                Galleries_tour::create([
                    'tour_id' => $tour->id,
                    'image_path' => $filename,
                ]);
            }
        }


        return response()->json($tour);
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
        $tour = Tours::with('images')->find($id);

        if ($tour->image)
        {
            $tour->image = asset('tours/' . $tour->image);
        }

        foreach ($tour->images as $img)
        {
            $img->image_path = asset('galleries/' . $img->image_path);
        }

        return response()->json($tour);
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
        $tour = Tours::find($id);
        if (!$tour) {
            return response()->json($tour, 404);
        }

        $tour->deleted = 1;
        $tour->save();

        return response()->json($tour, 200);
    }

}
