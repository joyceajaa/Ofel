<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'alamat',
        'nomor_telepon',
        'jadwal_toko',
        'user_id', // Tambahkan user_id ke fillable
    ];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_users'); // sesuaikan foreign key dan local key
    }
}
