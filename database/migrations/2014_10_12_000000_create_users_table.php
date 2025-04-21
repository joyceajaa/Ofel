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
            $table->id('id_users'); // Menggunakan id_users sebagai primary key
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); // Opsional, tapi standar Laravel
            $table->string('password');
            $table->string('phone')->nullable(); // Kolom phone, bisa null
            $table->boolean('is_admin')->default(false); // Kolom is_admin, default false (pelanggan)
            $table->rememberToken(); // Standar Laravel untuk "remember me"
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
