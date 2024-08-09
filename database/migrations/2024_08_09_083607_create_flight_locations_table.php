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
        Schema::create('flight_locations', function (Blueprint $table) {
            $table->id();
            $table->string('flight_city', 100);
            $table->string('flight_country', 100);
            $table->string('flight_district', 100);
            $table->string('flight_ward', 100);
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_locations');
    }
};
