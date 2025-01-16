<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class VoucherController extends Controller
{

    const PATH_UPLOAD = 'vouchers';
    /**
     * Display a listing of the resource.
     */

   public function __construct()
   {
       $this->middleware(function ($request, $next){
           try {
               return $next($request);
           } catch (Throwable $e) {
               return response()->json(['message' => $e->getMessage()], 500);
           }
       });
   }
    public function index()
    {
        $now = Carbon::now();
        Voucher::where('valid_until', '<', $now)
            ->where('status', 1)
            ->update(['status' => 0]);

        if (request()->ajax()) {
            $vouchers = Voucher::where('deleted', 1)->select('vouchers.*');
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
                    $imagePath = asset('vouchers/' . $vouchers->image);
                    $img = '<img src="' . $imagePath . '" width="50px" height="50px"/>';
                    return $img;
                })
                ->editColumn('status', function ($vouchers) {
                    if ($vouchers->status == 1) {
                        $span = 'Active';
                    } else {
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
            'name' => 'required|max:100',
            'quantity' => 'required|integer|min:1',
            'discount_amount' => 'required|numeric|min:0',
            'valid_from' => 'required|date',
            'valid_until' => 'required|date|after:valid_from',
            'voucher_code' => [
                'nullable',
                Rule::unique('vouchers', 'voucher_code')
                    ->ignore($request->voucher_id, 'id')
            ]
        ]);

//        $voucherCode = !empty(trim($request->voucher_code))
//            ? $request->voucher_code : Str::random(10);
        $voucherCode = ($request->voucher_code_option === 'random')
            ? strtoupper(Str::random(10))
            : $request->voucher_code;

        $voucherData = $request->only([
            'name',
            'quantity',
            'discount_amount',
            'valid_from',
            'valid_until'
        ]);
        $voucherData['voucher_code'] = $voucherCode;

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path(self::PATH_UPLOAD), $fileName);
            $voucherData['image'] = $fileName;
        }

        Voucher::updateOrCreate(['id' => $request->voucher_id], $voucherData);

        return response()->json(['success' => true, 'message' => 'Voucher saved successfully']);
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
        if (!$voucher) {
            return response()->json(['error' => 'Data Not Found'], 404);
        }

        $voucher->deleted = 0;
        $voucher->save();
//        sweetalert()->addSuccess('Success', 'Delete voucher successfully');
        return response()->json(sweetalert()->addSuccess('Success', 'Delete voucher successfully'), 200);
    }

    /**
     * Generate a random voucher code.
     */
    private function generateRandomVoucherCode()
    {
        do {
            $code = strtoupper(Str::random(10));
        } while (Voucher::where('voucher_code', $code)->exists());
        return $code;
    }

    public function userVouchers(Request $request, $voucherCode)
    {
        try {
            // Check user authentication
            if (!auth()->check()) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $now = Carbon::now();

            // Sử dụng transaction để bảo vệ dữ liệu
            $voucher = Voucher::where('voucher_code', $voucherCode)
                ->where('status', 1) // Active status
                ->where('valid_from', '<=', $now)
                ->where('valid_until', '>=', $now)
                ->lockForUpdate() // Khoá hàng để tránh cập nhật đồng thời
                ->first();

            if (!$voucher || $voucher->quantity <= 0) {
                return response()->json(['message' => 'Voucher is either inactive, expired, or out of stock'], 400);
            }

            // Giảm số lượng voucher
            $voucher->quantity -= 1;
            $voucher->save();

            return response()->json(['message' => 'Voucher applied successfully'], 200);

        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

}
