<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Carbon\Carbon;
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
        $now = Carbon::now();
        Voucher::where('valid_until', '<', $now)
            ->where('status', 0)
            ->update(['status' => 1]);

        if (request()->ajax()) {
            $vouchers = Voucher::where('deleted', 0)->select('vouchers.*');
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
                ->editColumn('status' , function ($vouchers) {
                    if ($vouchers->status == 0){
                        $span = 'Active';
                    }else{
                        $span = 'Inactive';
                    }
                    return $span;
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
        $request->validate([
            'name' => ['required', 'max:100'],
        ]);

        $voucherData = [
            'voucher_code' => $request->voucher_code,
            'quantity' => $request->quantity,
            'discount_amount' => $request->discount_amount,
            'name' => $request->name,
            'description' => $request->description,
            'valid_from' => $request->valid_from,
            'valid_until' => $request->valid_until,
            'deleted' => 0
        ];

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(self::PATH_UPLOAD), $fileName);
            $voucherData['image'] = $fileName;
        }

        $voucher = Voucher::updateOrCreate([
            'id' => $request->voucher_id,
        ], $voucherData);

        return response()->json($voucher);
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
        $voucher = Voucher::find($id);
        return response()->json($voucher);
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
        $voucher = Voucher::find($id);
       if (!$voucher){
           return response()->json(['error' => 'Data Not Found'], 404);
       }

       $voucher->deleted = 1;
       $voucher->save();

       return response()->json(['success' => 'Data Deleted Successfully']);
    }

    public function userVouchers(Request $request, $voucherCode)
    {
        try {
            // check user is logged in
            if (!auth()->check()) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            // Lấy thông tin voucher
            $voucher = Voucher::where('voucher_code', $voucherCode)->firstOrFail();

            // check status of voucher
            $now = Carbon::now();
            if ($voucher->quantity > 0 && $voucher->status == 0 && $voucher->valid_from <= $now && $voucher->valid_until >= $now) {
                // Giảm số lượng voucher
                $voucher->quantity -= 1;

                // save voucher
                $voucher->save();

                return response()->json(['message' => 'Voucher applied successfully'], 200);
            } else {
                return response()->json(['message' => 'Voucher is either inactive or expired or no quantity left'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

}
