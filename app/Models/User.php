<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Rellenar con los valores necesarios para el registro de usuarios
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Método para relacionar posts y usuarios (llama al modelo: Post) (ver tabla posts)
    public function posts() {
        // Relación usuario posts: hasMany= One to many
        return $this->hasMany(Post::class);
    }

    // Un usuario puede tener múltiples likes
    public function likes()
    {
        // Relación: hasMany= One to many
        return $this->hasMany(Like::class);
    }

    // Almacenar los seguidores de un usuario
    public function followers()
    {
        // Relación entre usuarios: Un usuario puede tener muchos seguidores (followers).
        // Esta relación es de tipo "muchos a muchos" entre la tabla de usuarios y la tabla intermedia 'followers'.
        // El método 'belongsToMany' establece que la relación utiliza una tabla pivote (followers) para asociar usuarios.
        // El primer parámetro 'User::class' indica que la relación es con la misma tabla de usuarios (auto-relación).
        // El segundo parámetro 'followers' especifica el nombre de la tabla pivote que contiene las asociaciones entre usuarios y seguidores.
        // El tercer parámetro 'user_id' define la clave foránea en la tabla 'followers' que hace referencia al usuario seguido.
        // El cuarto parámetro 'follower_id' define la clave foránea en la tabla 'followers' que hace referencia al usuario que sigue (seguidor).
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');

    }

    // Almacenar los que siguen

}
