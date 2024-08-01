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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->string('image', 100)->nullable();
            $table->string('slug', 150)->unique()->nullable();
            $table->string('price', 50); // removed second argument
            $table->string('vehicle', 100);
            $table->string('departure_date', 100);
            $table->string('return_date', 100);
            $table->string('tour_code', 100)->unique(); // tour codes are usually unique
            $table->string('departure', 100);
            $table->string('tour_time', 100);
            $table->string('tour_to', 100);
            $table->integer('quantity'); // removed second argument
            $table->boolean('deleted')->default(0); // changed to boolean for clarity
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
