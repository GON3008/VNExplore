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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
//            $table->string('name' , 100)->unique();
//            $table->string('slug' , 100)->unique();
//            $table->string('image' , 100)->nullable();
//            $table->string('description' , 100)->nullable();
//            $table->string('price' , 100);
//            $table->string('price_discount' , 100)->nullable();
//            $table->string('vehicle' , 100);
//            $table->string('flight_number' , 100)->unique();
//            $table->string('departure_city' , 100);
//            $table->string('arrival_city' , 100);
//            $table->string('departure_date' , 100);
//            $table->string('return_date' , 100);
//            $table->string('flight_code' , 100)->unique();
//            $table->string('departure' , 100);
//            $table->string('flight_time' , 100);
//            $table->string('flight_to' , 100);
//            $table->integer('quantity');
//            $table->boolean('deleted')->default(0);
//            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
//            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
//            $table->foreignId('flight_type_id')->constrained('flight_types')->onDelete('cascade');
//            $table->foreignId('flight_status_id')->constrained('flight_statuses')->onDelete('cascade');
//            $table->foreignId('airline_id')->constrained('airlines')->onDelete('cascade');
//            $table->foreignId('airplane_id')->constrained('airplanes')->onDelete('cascade');
//            $table->foreignId('airport_id')->constrained('airports')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
