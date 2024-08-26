<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    
    <!-- Contar si hay posts -->
    @if($posts->count())

        {{-- {{ dd($posts) }} --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <!-- Se obtiene la vista de posts y captura aquél que se quire mostrar. $post es un objeto al que se itera -->
                    <!-- Se utiliza un segundo parámetro para añadir el usuario. La varieble $user está definida en este template y permite usarla en todo el template -->
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}" class="rounded-lg">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-center">No Hay Posts, sigue a alguien para poder mostar sus posts</p>
    @endif
</div>