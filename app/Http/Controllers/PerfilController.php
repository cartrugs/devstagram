<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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

        if($request->imagen) {
            // dd('Sí hay imagen');
            $imagen = $request->file('imagen');

            // Genera un ID único para cada imagen con Str::uuid
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            // Variable de imagen con una instancia de Intevention Image
            $imagenServidor = Image::make($imagen);
            // Efecto de Intervention Image para que la imagen tenga 1000px ancho y 1000px alto
            $imagenServidor->fit(1000, 1000);

            // Guarda la imagen en el servidor
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            $imagenServidor->save($imagenPath);
        } 

        // Guardar cambios
        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;
        // Primero revisa si hay imagen, en caso de que no haya, se va a esta parte: ->imagen ?? null
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        // Redireccionar
        // Si el usuario modifica su nombre, $usuario es una instancia de la última copia
        return redirect()->route('posts.index', $usuario->username);

    }

}
