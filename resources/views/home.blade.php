<!-- Directiva -->
@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido')

        {{-- Componente de Laravel (resources/views/components/listar-post) --}}
        {{-- :posts=$posts es la forma de pasar la variable hacia el componente --}}
        <x-listar-post :posts="$posts" />

@endsection