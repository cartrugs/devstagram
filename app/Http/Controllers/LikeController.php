<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // dd($request->user()->id);
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    // Método para eliminar un like
    public function destroy(Request $request, Post $post)
    {
        // dd('Eliminando like...');

        // En $request va el usuario, el cual tiene los likes, que a su vez está asociado al modelo para por último filtar el piost en el que se desea eliminar el like
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();

    }

}
