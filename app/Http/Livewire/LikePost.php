<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;

    // Valor booleano
    public $isLiked; // Estado si el post ya ha sido likeado por el usuario
    public $likes; // Contador de likes

    // mount es una función que se ejecuta automáticamnte cuando es instanciado like-post
    public function mount($post)
    {
        // Aquí se revisa si el usuario que lo llama ya le dio me gusta
        $this->isLiked = $post->checkLike(auth()->user());
        $this->likes = $post->likes->count();
    }

    // Función que maneja la acción del like
    public function like()
    {
        if( $this->post->checkLike(auth()->user()) ) {
            // En $request va el usuario, el cual tiene los likes, que a su vez está asociado al modelo para por último filtar el piost en el que se desea eliminar el like
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->likes--; // Decrementar el contador de likes
        } else {
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++; // Incrementar el contador de likes
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
