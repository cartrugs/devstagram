<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    // User es el perfil que está siendo visitado
    public function store(User $user, Request $request)
    {
        // dd($user->username);
        // Establece una relación de "muchos a muchos" entre el usuario actual y otro usuario (seguido).
        // El método 'attach' añade una nueva entrada en la tabla pivote 'followers' para representar que el usuario autenticado (auth()->user())
        // sigue al usuario especificado por '$user'.
        // En este caso, 'auth()->user()->id' se refiere al ID del usuario que está iniciando la acción (el seguidor).
        // Este método actualiza la tabla pivote 'followers', asignando el 'follower_id' (ID del usuario autenticado) al 'user_id' (ID del usuario seguido).
        $user->followers()->attach( auth()->user()->id );

        return back();
    }
}
