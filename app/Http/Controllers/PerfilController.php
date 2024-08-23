<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd('Aquí se muestra el formulario...');
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        // dd('Guardando cambios...');

        // Modificación del request para que no haya dos usuarios iguales. slug convierte una cadena a una sin espacios, minúsculas y separada por guiones
        $request->request->add(['username' => Str::slug($request->username)]);
        
        // Validación para que no haya dos usuarios iguales
        // Cuando hay más de tres reglas Laravel recomineda usar arrays para definirlas
        $this->validate($request, [
            // En el campo username se verifica si el username y el id están asociados
            'username' => ['required', 'unique:users,username,' .auth()->user()->id, 'string', 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
        ]);
    }

}
