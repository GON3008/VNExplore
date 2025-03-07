<?php

namespace App\Http\Controllers\Admin;

use App\Models\CancellationPolicies;
use Illuminate\Http\Request;

class CancellationPolicies_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $cancel_policies = CancellationPolicies::with('room_option_id')
                ->select('cancellation_policies.*');
            return datatables()
                ->of($cancel_policies)
                ->addColumn('action', function ($cancel_policies) {
                    $button = '<button type="button" name="edit" id="' . $cancel_policies->id . '" class="cp_edit btn btn-primary btn-sm">
            <i class="uil-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $cancel_policies->id . '" class="cp_delete btn btn-danger btn-sm">
            <i class="uil-trash-alt"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.hotel_manager.cancellation_policies.index');
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
        $cp_id = $request->cp_id;
        $rule = [
            'room_option_id' => 'required',
        ];
        $request->validate($rule);
        $cancel_policies = CancellationPolicies::updateOrCreate(
            ['id' => $cp_id],
            [
                'room_option_id' => $request->room_option_id,
                'free_cancellation_until' => $request->free_cancellation_until,
                'apply_before' => $request->apply_before,
                'apply_after' => $request->apply_after,
                'amount' => $request->amount,
                'currency' => $request->currency,
                'modification_policy' => $request->modification_policy,
                'time_zone' => $request->time_zone,
            ],
        );
        $cancel_policies->save();
        return response()->json(['success' => 'Cancellation policies saved successfully']);
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
        try {
            $cancel_policies = CancellationPolicies::where('id', $id)->firstOrFail();
            return response()->json($cancel_policies);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Cancellation policies not found.']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cancel_policies = CancellationPolicies::findOrFail($id);
        $cancel_policies->update($request->all());
        return response()->json(['success' => 'Cancellation policies updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cancel_policies = CancellationPolicies::where('id', $id)->first();
        if (!$cancel_policies) {
            return response()->json(['error' => 'Cancellation policies not found'], 404);
        }
        $cancel_policies->save();
        return response()->json(['success' => 'Cancellation policies delete successfully'], 200);
    }
}
