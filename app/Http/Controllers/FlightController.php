<?php

namespace App\Http\Controllers;

use App\Models\Categories;
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
            $flights = Flight::with('category')->where('deleted', 0)->select('flights.*');
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
        $categories= Categories::all();
        return view('admin.flights.index', compact('categories'));
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
