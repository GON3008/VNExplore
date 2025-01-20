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
        Schema::create('hotel_policies', function (Blueprint $table) {
            $table->id('hp_id');
            $table->text('hp_payment_policy')->nullable(); // Mô tả chính sách thanh toán
            $table->decimal('hp_cancellation_fee', 10, 2)->default(0); // Phí hủy phòng
            $table->integer('hp_free_cancellation_days')->default(0); // Số ngày hủy miễn phí
            $table->decimal('hp_booking_fee', 10, 2)->default(0); // Phí đặt phòng
            $table->boolean('hp_is_free_cancellation')->default(false); // Miễn phí hủy phòng
            $table->time('hp_checkin_time')->nullable(); // Giờ check-in
            $table->time('hp_checkout_time')->nullable(); // Giờ check-out
            $table->text('hp_policy_notes')->nullable(); // Ghi chú về chính sách

            $table->decimal('hp_late_checkout_fee', 10, 2)->nullable(); // Phí trả phòng muộn
            $table->decimal('hp_early_checkin_fee', 10, 2)->nullable(); // Phí nhận phòng sớm
            $table->boolean('hp_allows_pets')->default(false); // Có cho phép thú cưng không
            $table->boolean('hp_allows_smoking')->default(false); // Có cho phép hút thuốc không
            $table->boolean('hp_is_child_friendly')->default(true); // Thân thiện với trẻ em

            $table->foreignId('hp_hotel_room_id')->constrained('hotel_rooms')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_policies');
    }
};
