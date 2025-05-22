<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyContactsTable extends Migration
{
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn(['name', 'subject', 'message']); // Hapus kolom

            $table->string('alamat')->nullable(); // Tambah kolom alamat
            $table->string('nomor_telepon')->nullable(); // Tambah kolom nomor_telepon
            $table->string('jadwal_toko')->nullable(); // Tambah kolom jadwal_toko
        });
    }

    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('name'); // Kembalikan kolom name
            $table->string('subject'); // Kembalikan kolom subject
            $table->text('message'); // Kembalikan kolom message

            $table->dropColumn(['alamat', 'nomor_telepon', 'jadwal_toko']);// Hapus kolom alamat, nomor_telepon, jadwal_toko
        });
    }
}
