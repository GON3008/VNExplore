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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('Country', 50);
            $table->string('City', 50);
            $table->string('District', 255);
            $table->string('Ward', 255)->nullable();
            $table->integer('tour_count')->default(0);
            $table->integer('hotel_count')->default(0);
            $table->integer('flight_count')->default(0);
            $table->integer('car_count')->default(0);
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
