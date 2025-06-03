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
        Schema::create('wilayahs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Tambahkan user_id, nullable
            $table->string('nama');
            $table->timestamps();
        });

        // Tambahkan foreign key constraint menggunakan DB::statement()
        DB::statement("
            ALTER TABLE wilayahs
            ADD CONSTRAINT fk_wilayahs_user_id
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
        Schema::dropIfExists('wilayahs');
        DB::statement("ALTER TABLE wilayahs DROP FOREIGN KEY IF EXISTS fk_wilayahs_user_id"); // Hapus foreign key saat rollback
    }
};
