<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Datatables;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Categories::select('id', 'name', 'description'))
                ->addColumn('action', function ($categories) {
                    $button = '<button type="button" name="edit" id="' . $categories->id . '" class="edit btn btn-primary btn-sm">
<i class="uil-edit"></i>
</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $categories->id . '" class="delete btn btn-danger btn-sm">
<i class=" uil-trash-alt"></i>
</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.categories.index');
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
            'name' => ['required', 'max:100', 'unique:categories'],
            'description' => ['nullable'],
        ]);

        $categories = Categories::UpdateOrCreate([
            'id' => $request->category_id,
        ],
            [
                'name' => $request->name,
                'description' => $request->description,
            ]);

        return response()->json($categories);
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
    public function edit($id)
    {
        $categories = Categories::find($id);
        toastr()->success('Category successfully updated');
        return response()->json($categories);
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
        $categories = Categories::find($id);
        if ($categories) {
            $categories->delete();
            return response()->json(['success' => 'Data Deleted Successfully']);
        }
        return response()->json(['error' => 'Data Not Found'], 404);
    }
}
