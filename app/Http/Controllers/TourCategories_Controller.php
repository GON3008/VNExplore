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
            return datatables()->of(TourCategories::select('tour_categories.*'))
                ->addColumn('action', function ($tourCategories) {
                    $button = '<button type="button" name="edit" id="' . $tourCategories->id . '" class="edit btn btn-primary btn-sm">
<i class="uil-edit"></i>
</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $tourCategories->id . '" class="delete btn btn-danger btn-sm">
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
        return view('admin.categories.tours.index');
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
