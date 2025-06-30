<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;
use App\Models\Payments;

class PaymentController extends Controller
{
    public function createVnpayPayment(Request $request)
    {
        $vnp_TmnCode = config('payment.vnpay.tmn_code');
        $vnp_HashSecret = config('payment.vnpay.hash_secret');
        $vnp_Url = config('payment.vnpay.url');
        $vnp_ReturnUrl = config('payment.vnpay.return_url');

        $amount = $request->input('amount');
        $payment = Payments::create([
            'service_type' => 'booking',
            'service_id' => $request->input('booking_id'),
            'payment_method' => 'vnpay',
            'amount' => $amount,
            'currency' => 'VND',
            'status' => 'pending',
        ]);

        // Tạo query VNPay
        $vnp_TxnRef = $payment->id;
        $vnp_OrderInfo = "Thanh toan don hang #$vnp_TxnRef";
        $vnp_Amount = $amount * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_Command" => "pay",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_CurrCode" => "VND",
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_Locale" => $vnp_Locale,
            "vnp_ReturnUrl" => $vnp_ReturnUrl,
            "vnp_IpAddr" => $vnp_IpAddr,
        ];

        ksort($inputData);
        $query = urldecode(http_build_query($inputData));
        $hashData = implode('&', array_map(
            fn($k, $v) => "$k=$v",
            array_keys($inputData),
            $inputData
        ));
        $vnpSecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $vnp_Url .= '?' . $query . '&vnp_SecureHash=' . $vnpSecureHash;

        return redirect($vnp_Url);
    }

    // Xử lý phản hồi từ VNPay
    public function vnpayCallback(Request $request)
    {
        $vnp_HashSecret = config('payment.vnpay.hash_secret');
        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $inputData = $request->except(['vnp_SecureHash']);

        ksort($inputData);
        $hashData = implode('&', array_map(
            fn($k, $v) => "$k=$v",
            array_keys($inputData),
            $inputData
        ));

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash === $vnp_SecureHash) {
            $payment = Payments::findOrFail($request->input('vnp_TxnRef'));
            $payment->updateStatus($inputData);

            return redirect('/booking-success')->with('success', 'Thanh toán thành công!');
        } else {
            return redirect('/booking-fail')->with('error', 'Xác thực thất bại!');
        }
    }
}
