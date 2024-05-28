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
        if(request()->ajax()) {
            return datatables()->of(Categories::select('id', 'name', 'slug', 'image', 'status'))
                ->addColumn('action', function ($categories) {
                    $button = '<button type="button" name="edit" id="'.$categories->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="'.$categories->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
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
