<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showQR(Request $request)
    {
        $order_id = $request->input('order_id');
        $amount = $request->input('amount');

        if (!$order_id || !$amount) {
            return redirect()->back()->with('error', 'Thiếu thông tin đơn hàng.');
        }

        // Thông tin từ .env
        $bankCode = env('VIETQR_BANK_CODE');
        $accountNumber = env('VIETQR_ACCOUNT_NUMBER');
        $accountName = env('VIETQR_ACCOUNT_NAME');

        // Nội dung chuyển khoản
        $description = "Thanh toan don hang $order_id";

        // Tạo URL QR Code
        $vietQRUrl = "https://img.vietqr.io/image/{$bankCode}-{$accountNumber}-compact.png?amount={$amount}&addInfo={$description}&accountName={$accountName}";

        return view('payment.vietqr', compact('vietQRUrl', 'order_id', 'amount'));
    }
}
