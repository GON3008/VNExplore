<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_options', function (Blueprint $table) {
            $table->id('ro_id');
            $table->decimal('ro_price', 10, 2);
            $table->decimal('ro_discount', 10, 2)->default(0);
            $table->enum('ro_bed_type', ['1 king bed', '1 queen bed', '2 single bed'])->default('1 king bed');
            $table->integer('ro_quantity');
            $table->text('ro_description')->nullable();
            $table->enum('ro_status', ['available', 'booked', 'maintenance', 'unavailable'])->default('available');
            $table->integer('ro_max_guests')->default(2);
            $table->decimal('ro_extra_bed_price', 10, 2)->nullable();
            $table->boolean('ro_is_refundable')->default(true);
            $table->text('ro_cancellation_policy')->nullable();
            $table->time('ro_checkin_time')->default('14:00');
            $table->time('ro_checkout_time')->default('12:00');
            $table->boolean('ro_is_featured')->default(false);
            $table->enum('ro_views', ['sea view', 'city view', 'garden view'])->nullable();
            $table->decimal('ro_area', 5, 2)->nullable();
            $table->foreignId('ro_hotel_room_id')->constrained('hotel_rooms')->onDelete('cascade');
            $table->foreignId('ro_hotel_category_id')->constrained('hotel_categories')->onDelete('cascade');
            $table->foreignId('ro_created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_options');
    }
};
