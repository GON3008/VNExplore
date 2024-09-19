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
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_name', 100);
            $table->decimal('room_price', 10, 2);
            $table->decimal('room_discount', 10, 2);
            $table->text('room_images');
            $table->text('room_description')->nullable();
            $table->boolean('room_rating')->default(1);
            $table->boolean('room_status')->default(1);
            $table->enum('bed_type',['1 king bed','2 single bed'])->default('single');
            $table->foreignId('hotel_category_id')->constrained('hotel_categories')->onDelete('cascade');
            $table->foreignId('hotel_service_id')->constrained('hotel_services')->onDelete('cascade');
            $table->foreignId('hotel_location_id')->constrained('hotel_locations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_rooms');
    }
};
