<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Tambahkan user_id, nullable
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('message');
            $table->timestamps(); // Untuk kolom created_at dan updated_at
        });

        // Tambahkan foreign key constraint menggunakan DB::statement()
        DB::statement("
            ALTER TABLE contacts
            ADD CONSTRAINT fk_contacts_user_id
            FOREIGN KEY (user_id)
            REFERENCES users(id_users)
            ON DELETE SET NULL;
        ");
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
        DB::statement("ALTER TABLE contacts DROP FOREIGN KEY IF EXISTS fk_contacts_user_id"); // Hapus foreign key saat rollback
    }
}
