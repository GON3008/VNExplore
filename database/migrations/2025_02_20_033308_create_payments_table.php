<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('service_type'); // 'hotel', 'flight', 'car', 'tour'
            $table->unsignedBigInteger('service_id'); // ID của booking liên quan
            $table->string('payment_method'); // VNPay, Momo, Cash, v.v.
            $table->string('transaction_id')->nullable(); // Mã giao dịch từ cổng thanh toán
            $table->decimal('amount', 15, 2); // Số tiền thanh toán
            $table->decimal('fee', 10, 2)->default(0); // Phí giao dịch
            $table->decimal('refund_amount', 15, 2)->default(0); // Số tiền hoàn lại (nếu có)
            $table->enum('currency', ['VND', 'USD'])->default('VND');
            $table->enum('status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
            $table->string('payment_gateway_response')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->index(['service_type', 'service_id']); // Tạo index cho truy vấn nhanh hơn
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
