<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    // Es necesario importar User y Post para que se puedan agregar comnetarios. No se utilizará User pero es necesario pasarlo como parámetro porque así está definido en la ruta
    public function store(Request $request, User $user, Post $post)
    {
        // dd($post->id);

        // Validar
        $this->validate($request, [
            'comentario' => 'required|max:255'
        ]);

        // Almacenar el resultado
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);

        // Imprimir un mensaje
        // Se requiere session en show.blade para poder mostrar el mensaje tras enviar Comentar
        return back()->with('mensaje', 'Comentario Realizado Correctamente');
    }
}
