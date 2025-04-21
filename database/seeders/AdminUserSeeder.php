<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Import Hash facade
use App\Models\User; // Import model User

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin dengan email ini sudah ada, agar tidak duplikat jika seeder dijalankan lagi
        $adminExists = User::where('email', 'admin@example.com')->exists();

        if (!$adminExists) {
            User::create([
                'name' => 'Administrator', // Nama admin
                'email' => 'admin@gmail.com', // Email untuk login admin
                'password' => Hash::make('adminofel'), // Password admin (misal: "password"). Hash::make() akan mengenkripsinya.
                'phone' => '081234567890', // Nomor telepon (opsional, bisa null)
                'is_admin' => true, // PENTING: Set ke true untuk menandakan ini adalah admin
                'email_verified_at' => now(), // Opsional: Anggap email sudah terverifikasi
                // created_at dan updated_at akan diisi otomatis oleh Eloquent
            ]);

            // Anda bisa menambahkan output ke console jika mau
            $this->command->info('Admin user created successfully!');
            $this->command->info('Email: admin@example.com');
            $this->command->info('Password: password'); // Ingatkan password default

        } else {
             $this->command->info('Admin user (admin@example.com) already exists. Skipped creation.');
        }

        // Anda bisa menambahkan user admin lain jika perlu di sini
        // User::create([...]);
    }
}
