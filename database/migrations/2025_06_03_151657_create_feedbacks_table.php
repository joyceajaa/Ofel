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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Tambahkan user_id, nullable
            $table->foreign('user_id')->references('id_users')->on('users')->onDelete('set null'); // Foreign key ke kolom id_users di tabel users
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->string('image')->nullable(); // Tambahkan kolom image, nullable
            $table->string('video')->nullable(); // Tambahkan kolom video, nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
