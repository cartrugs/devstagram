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

}
