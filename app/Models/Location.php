<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'location', // Kolom untuk embed code
        'user_id', // Tambahkan user_id ke fillable
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'location' => 'string',  // Pastikan di cast ke string
    ];

     // Definisikan relasi dengan model User
     public function user()
     {
         return $this->belongsTo(User::class, 'user_id', 'id_users'); // sesuaikan foreign key dan local key
     }

}
