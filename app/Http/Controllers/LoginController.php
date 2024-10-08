<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        // dd($request->remember);

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->remember )) {
            // back vuelve a la página anterior si hay error usando with
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        // Redirigir a la ruta posts.index con el username del usuario
        return redirect()->route('posts.index', auth()->user()->username );
    }
}
