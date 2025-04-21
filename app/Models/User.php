<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Nama tabel yang terkait dengan model.
     *
     * @var string
     */
    protected $table = 'users'; // Pastikan nama tabel benar

    /**
     * Primary key untuk model.
     *
     * @var string
     */
    protected $primaryKey = 'id_users'; // Definisikan primary key kustom

    /**
     * Menunjukkan apakah ID auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true; // Tetap true jika id_users auto-increment

    /**
     * Tipe data primary key.
     *
     * @var string
     */
    protected $keyType = 'int'; // Atau 'bigint' jika menggunakan bigIncrements

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'is_admin', // Tambahkan is_admin ke fillable
    ];

    /**
     * Atribut yang harus disembunyikan saat serialisasi.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang harus di-cast ke tipe native.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Otomatis hash saat di-set
        'is_admin' => 'boolean', // Cast is_admin ke boolean
    ];
}
