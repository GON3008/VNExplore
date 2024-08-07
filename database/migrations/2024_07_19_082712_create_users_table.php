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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone', 10)->nullable();
            $table->string('address', 255)->nullable();
            $table->enum('role',['admin','client','lead'])->default('client');
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_active')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->string('avatar')->nullable();
            $table->boolean('deleted')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');

        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(0)->change();
        });
    }
};
