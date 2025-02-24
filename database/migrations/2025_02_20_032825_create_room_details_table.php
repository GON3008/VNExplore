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
        Schema::create('room_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_option_id')->constrained('room_options')->onDelete('cascade');
            $table->string('room_number')->unique(); // Số phòng
            $table->enum('status', ['Available', 'Booked', 'Maintenance', 'Unavailable'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_details');
    }
};
