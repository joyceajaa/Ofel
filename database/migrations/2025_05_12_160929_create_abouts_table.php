<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Tambahkan user_id, nullable
            $table->string('title');
            $table->text('description');
            $table->string('image_path')->nullable(); // Path ke file gambar
            $table->timestamps();
        });

        // Tambahkan foreign key constraint menggunakan DB::statement()
        DB::statement("
            ALTER TABLE abouts
            ADD CONSTRAINT fk_abouts_user_id
            FOREIGN KEY (user_id)
            REFERENCES users(id_users)
            ON DELETE SET NULL;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
        DB::statement("ALTER TABLE abouts DROP FOREIGN KEY IF EXISTS fk_abouts_user_id"); // Hapus foreign key saat rollback
    }
};
