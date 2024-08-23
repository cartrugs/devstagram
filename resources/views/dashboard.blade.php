@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection


@section('contenido')

    <div class="flex justify-center"> 
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg') }}" alt="Espacio para que el usuario pueda añadir su imagen">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py:10">
                {{-- Imprime el nombre del usuario --}}
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

                    @auth
                        @if($user->id === auth()->user()->id)
                            <a 
                                href="{{ route('perfil.index') }}" 
                                class="text-gray-500 hover:text-gray-600 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                                </svg>
                            </a>


                        @endif
                    @endauth
                </div>

                <p class="text-gray-800 text-sm mb-3 font bold mt-5">
                    0
                    <span class="font-normal"> Seguidores</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font bold">
                    0
                    <span class="font-normal"> Siguiendo</span>
                </p>
                <p class="text-gray-800 text-sm mb-3 font bold">
                    0
                    <span class="font-normal"> Posts</span>
                </p>
            </div>

        </div>
    </div>

    <section>
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>

        <!-- Contar si hay posts -->
        @if($posts->count())

        {{-- {{ dd($posts) }} --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <!-- Se obtiene la vista de posts y captura aquél que se quire mostrar. $post es un objeto al que se itera -->
                    <!-- Se utiliza un segundo parámetro para añadir el usuario. La varieble $user está definida en este template y permite usarla en todo el template -->
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}" class="rounded-lg">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>

        <!-- Si no hay posts se muestra este párrafo en el servidor -->
        @else
            <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
        @endif

    </section>

@endsection