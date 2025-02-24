<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cancellation_policies', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->foreignId('room_option_id')
                ->unique() // Mỗi room_option chỉ có một chính sách hủy
                ->constrained('room_options')
                ->onDelete('cascade');

            $table->dateTime('free_cancellation_until')->nullable(); // Ngày miễn phí hủy
            $table->dateTime('apply_before')->nullable(); // Ngày áp dụng phí hủy
            $table->dateTime('apply_after')->nullable(); // Ngày bắt đầu phí hủy cao hơn
            $table->decimal('amount', 15, 2)->nullable(); // Phí hủy
            $table->string('currency', 10)->nullable();
            $table->text('modification_policy')->nullable();
            $table->string('time_zone', 255)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cancellation_policies');
    }
};
