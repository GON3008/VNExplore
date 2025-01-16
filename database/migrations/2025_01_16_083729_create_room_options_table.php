<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_options', function (Blueprint $table) {
            $table->id();
            $table->decimal('room_price', 10, 2);
            $table->decimal('room_discount', 10, 2);
            $table->enum('bed_type', ['1 king bed', '1 queen bed', '2 single bed'])->default('1 king bed');
            $table->foreignId('hotelRoom_id')->constrained('hotel_rooms')->onDelete('cascade');
            $table->foreignId('hotelCategory_id')->constrained('hotel_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_options');
    }
};
