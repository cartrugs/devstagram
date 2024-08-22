<?php

namespace App\Http\Controllers;

use App\Models\Post;
use auth;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        // dd($user->id);

        $posts = Post::where('user_id', $user->id)->paginate(20);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        // dd('Creando Post...');
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // dd('Creando publicación...');
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' =>'required',
            'imagen' => 'required'
        ]);

        // Primera forma para guardar registros en DB
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);

        // Segunda forma para guardar registros en DB
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        // Tercera forma para guardar registros
        // Accede al usuario, al posts, y crea el registro en la relación
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);
    }
}
