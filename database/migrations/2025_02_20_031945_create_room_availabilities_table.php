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
        Schema::create('room_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_option_id')->constrained('room_options')->onDelete('cascade');
            $table->date('date');
            $table->integer('available_rooms'); // Số lượng phòng trống
            $table->integer('booked_rooms')->default(0); // Số lượng phòng đã đặt
            $table->integer('maintenance_rooms')->default(0); // Số lượng phòng bảo trì
            $table->integer('unavailable_rooms')->default(0); // Số lượng phòng khong kha dung
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_availabilities');
    }
};
