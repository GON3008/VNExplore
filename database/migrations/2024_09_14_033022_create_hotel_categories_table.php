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
        Schema::create('hotel_categories', function (Blueprint $table) {
            $table->id();
            $table->string('hotelCategory_name', 100);
            $table->text('hotelCategory_description')->nullable();
            $table->text('hotelCategory_images')->nullable();
            $table->boolean('hotelCategory_status')->default(1);
            $table->boolean('hotelCategory_rating')->default(1);
            $table->boolean('hotelCategory_deleted')->default(1);
            $table->foreignId('list_categories_id')->constrained('list_categories')->onDelete('cascade');
            $table->foreignId('hotel_location_id')->constrained('hotel_locations')->onDelete('cascade');
            $table->foreignId('hotel_service_id')->constrained('hotel_services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_categories');
    }
};
