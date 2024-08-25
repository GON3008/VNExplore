<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourCategories;
use Datatables;
class TourCategories_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $tourCategories = TourCategories::where('deleted', 0)->select('tour_categories.*');
            return datatables()->of($tourCategories)
                ->addColumn('action', function ($tourCategories) {
                    $button = '<button type="button" name="edit" id="' . $tourCategories->id . '" class="edit-tour btn btn-primary btn-sm">
<i class="uil-edit"></i>
</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $tourCategories->id . '" class="delete-tour btn btn-danger btn-sm">
<i class=" uil-trash-alt"></i>
</button>';
                    return $button;
                })
                ->editColumn('status', function ($tourCategories) {
                    if ($tourCategories->status == 0) {
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
         $tourCategories = TourCategories::all();
        return view('admin.categories.tours.index', compact('tourCategories'));
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
        $tourCategory_id = $request->tourCategory_id;

        $request->validate([
            'name' => ['required', 'max:100', 'unique:tour_categories'],
            'description' => ['nullable'],
        ]);

        $tourCategories = TourCategories::UpdateOrCreate([
            'id' => $tourCategory_id,
        ],
            [
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->is_active,
        ]);

        return response()->json($tourCategories);
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
        $tourCategories = TourCategories::find($id);
        return response()->json($tourCategories);
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
        $tourCategories = TourCategories::find($id);
        if (!$tourCategories){
            return response()->json(['error' => 'Data Not Found'], 404);
        }
        $tourCategories->deleted = 1;
        $tourCategories->save();
        return response()->json(['success' => 'Data Deleted Successfully'], 200);
    }
}
