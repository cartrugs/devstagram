<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DevStagram - @yield('titulo')</title>
        @vite('resources/css/app.css')

    </head>

    <body class="antialiased">

        <nav>
            <a href="/">Página Principal</a>
            <a href="/nosotros">Nosotros</a>
            <a href="/tienda">Tienda</a>
            <a href="/contacto">Contacto</a>
        </nav>

        <!-- Directiva "yield" registra como un contenedor -->
        <h1 class="text-4xl font-extrabold">@yield('titulo')<h1>

        <!-- Imprime una línea -->
        <hr>

        @yield('contenido')

    </body>

</html>