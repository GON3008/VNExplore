<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Datatables;

class VoucherController extends Controller
{

    const PATH_UPLOAD = 'vouchers';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $vouchers = Voucher::with('voucher')->where('deleted', 0)->select('vouchers.*');
            return datatables()->of($vouchers)
                ->addColumn('action', function ($vouchers) {
                    $button = '<button type="button" name="edit" id="' . $vouchers->id . '" class="edit btn btn-primary btn-sm">
                    <i class="uil-edit"></i>
                    </button>';
                    $button .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $vouchers->id . '" class="delete btn btn-danger btn-sm">
                    <i class=" uil-trash-alt"></i>
                    </button>';
                    return $button;
                })
                ->rawColumns(['action', 'image'])
                ->addColumn('image', function ($vouchers) {
                    $imagePath = asset('vouchers/'. $vouchers->image);
                    $img = '<img src="' . $imagePath . '" width="50px" height="50px"/>';
                    return $img;
                })
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.vouchers.index');
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

    public function userVouchers(Request $request, $voucherCode)
    {
        try{
            $voucher = Voucher::where('voucher_code', $voucherCode)->firtsOrFail();

            if ($voucher->quantity > 0) {
                $voucher->userVouchers();
                return response()->json(['message' => 'Voucher applied successfully'], 200);
            }else{
                return response()->json(['message' => 'No voucher left'], 400);
            }
        }catch (\Exception $e){
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
