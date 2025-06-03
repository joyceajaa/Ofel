<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Import model User

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'name',
        'image',
        'price',
        'description',
        'user_id', // Tambahkan user_id ke fillable
    ];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
