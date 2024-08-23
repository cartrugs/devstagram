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

    // Un post pertenece a un usuario
    public function user() 
    {
        // Relación entre usuario y posts: Un post pertenece a un usuario
        // Con select se obtienen los datos que se deseen
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    // Un post puede tener múltiples comentarios
    public function comentarios()
    {
        // Relación: hasMany= One to many
        return $this->hasMany(Comentario::class);
    }

    // Un post puede tener múltiples likes
    public function likes()
    {
        // Relación: hasMany= One to many
        return $this->hasMany(Like::class);
    }

    // Se revisa si un usuario ya dio like para evitar likes duplicados del mismo usuario
    public function checkLike(User $user)
    {
        // contains revisa (las columnas de la tabla) y se posiciona en la tabla likes y comprueba si user_id contiene $user->id 
        return $this->likes->contains('user_id', $user->id);
    }

}
