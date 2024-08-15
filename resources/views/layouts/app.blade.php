<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <title>DevStagram - @yield('titulo')</title>
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @vite('resources/js/app.js')

    </head>

    <body class="bg-gray-100">

        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">
                DevStagram
                </h1>
                
                <nav class="flex gap-2 items-center">
                    <a href="#" class="font-bold uppercase text-gray-600 text-sm" >Login</a>
                    <a href={{ route('register') }} class="font-bold uppercase text-gray-600 text-sm" >Crear Cuenta</a>
                    {{-- <a href="/tienda">Tienda</a>
                    <a href="/contacto">Contacto</a> --}}
                </nav>

            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                <!-- Directiva "yield" registra como un contenedor -->
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        {{-- 
            </div>
        </header>

        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
                <!-- Directiva "yield" registra como un contenedor -->
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        {{-- 
        <h1 class="text-4xl font-extrabold">@yield('titulo')<h1>

        <!-- Imprime una línea -->
        <hr>

        @yield('contenido') --}}

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            DevStagram - Todos los derechos reservados {{-- Fecha actual con Helper now()--}} {{ now()->year }}
        </footer>

        
        
        @yield('contenido') --}}

        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            DevStagram - Todos los derechos reservados {{-- Fecha actual con Helper now()--}} {{ now()->year }}
        </footer>

        
        

    </body>

</html>