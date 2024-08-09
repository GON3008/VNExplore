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
        Schema::create('tour_locations', function (Blueprint $table) {
            $table->id();
            $table->string('tour_city', 100);
            $table->string('tour_country', 100);
            $table->string('tour_district', 100);
            $table->string('tour_ward', 100);
            $table->boolean('deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_locations');
    }
};
