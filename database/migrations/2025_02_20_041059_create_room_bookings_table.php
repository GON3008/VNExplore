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
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_option_id')->constrained('room_options')->onDelete('cascade');
            $table->foreignId('room_detail_id')->constrained('room_details')->onDelete('cascade'); // Gán phòng cụ thể
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Người đặt phòng
            $table->date('date'); // Ngày đặt
            $table->enum('status', ['Booked', 'Checked_in', 'Checked_out']); // Trạng thái đặt phòng
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_bookings');
    }
};
