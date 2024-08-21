<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user() 
    {
        // Relación entre usuario y posts: Un post pertenece a un usuario
        // Con select se obtienen los datos que se deseen
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }
}
