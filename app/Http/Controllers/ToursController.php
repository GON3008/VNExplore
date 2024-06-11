<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use App\Models\Categories;
use Illuminate\Http\Request;
use Datatables;
class ToursController extends Controller
{
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
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $tours->id . '" class="delete btn btn-danger btn-sm">
                    <i class=" uil-trash-alt"></i>
                    </button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $categories = Categories::all();
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
            'name' => ['required', 'max:100', 'unique:tours'],
            'description' => ['nullable'],
        ]);

        $tours = Tours::UpdateOrCreate($request->all());

        return response()->json($tours);
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
