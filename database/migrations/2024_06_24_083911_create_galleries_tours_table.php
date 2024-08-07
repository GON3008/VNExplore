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
        if (!Schema::hasTable('galleries_tours')) {
            Schema::create('galleries_tours', function (Blueprint $table) {
                $table->id();
                $table->foreignId('tour_id')->constrained('tours')->onDelete('cascade');
                $table->string('image_path');
                $table->boolean('deleted')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries_tours');
    }
};
