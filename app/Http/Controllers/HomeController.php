<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* El método __invoke() se utiliza en los controladores de Laravel para simplificar la manejabilidad cuando el controlador solo necesita un único método. En lugar de definir un método específico como index() o show(), el método __invoke() permite que el controlador sea invocado directamente cuando se llama desde una ruta. Esto hace que las rutas sean más limpias y el código más organizado. */
    public function __invoke()
    {
        // dd('Home');

        // Obtener a quienes seguimos
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->paginate(20);

        return view('home', [
            'posts' => $posts,
        ]);
    }
}
