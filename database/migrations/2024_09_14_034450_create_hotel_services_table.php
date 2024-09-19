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
        Schema::create('hotel_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_room_id');
            $table->boolean('wifi')->default(1);
            $table->boolean('parking')->default(1);
            $table->boolean('pool')->default(1);
            $table->boolean('restaurant')->default(1);
            $table->boolean('bar')->default(1);
            $table->boolean('swimming_pool')->default(1);
            $table->boolean('gym')->default(1);
            $table->boolean('laundry')->default(1);
            $table->boolean('air_conditioning')->default(1);
            $table->boolean('kitchen')->default(1);
            $table->boolean('status')->default(1);
            $table->boolean('deleted')->default(1);
            $table->foreign('hotel_room_id')->references('id')->on('hotel_rooms')->onDelete('cascade');
            $table->foreignId('hotel_location_id')->constrained('hotel_locations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_services');
    }
};
