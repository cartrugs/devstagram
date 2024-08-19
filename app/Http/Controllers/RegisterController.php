<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);

        // Modificación del request para que no haya dos usuarios iguales. slug convierte una cadena a una sin espacios, minúsculas y separada por guiones
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validación
        $this->validate($request, [
            'name' => 'required|string|min:2|max:30',
            'username' => 'required|unique:users|string|min:3|max:20',
            'email' => 'required|email|unique:users|max:60',
            // confirmed hace que en el campo repetir password, verifique si coincide. En caso contrario lanza una advertencia
            'password' => 'required|confirmed|string|min:8',
        ]);

        // Método estático 
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make( $request->password )
        ]);


        // Autenticar un usuario con attempt
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // Otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));


        // Redireccionar con helper redirect
        return redirect()->route('posts.index');

    }

}
