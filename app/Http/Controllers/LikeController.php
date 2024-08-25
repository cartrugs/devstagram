<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // dd($request->user()->id);
        

        // return back();
    }

    // Método para eliminar un like
    public function destroy(Request $request, Post $post)
    {
        // dd('Eliminando like...');

        

    }

}
