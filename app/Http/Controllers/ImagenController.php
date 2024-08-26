<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        // Genera un ID único para cada imagen con Str::uuid
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        // Variable de imagen con una instancia de Intevention Image
        $imagenServidor = Image::make($imagen);
        // Efecto de Intervention Image para que la imagen tenga 1000px ancho y 1000px alto
        $imagenServidor->fit(1000, 1000);

        // Guarda la imagen en el servidor
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen ]);
    }
}
