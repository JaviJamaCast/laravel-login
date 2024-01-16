@extends('layouts.master')

@section('titulo', 'RevistApp')
@section('content')
<div class="container mx-auto py-5">
    <h1 class="text-3xl font-bold mb-3">Revistapp</h1>
    <h2 class="text-xl font-semibold mb-3">Detalle del artículo:</h2>
    <ul class="list-disc list-inside">
        <li>Fecha de creación: {{ $articulo->created_at }}</li>
        <li>Fecha de última actualización: {{ $articulo->updated_at }}</li>
        <li>Título: {{ $articulo->titulo }}</li>
        <li>Contenido: {{ $articulo->contenido }}</li>
    </ul>
    @auth
    <h3 class="text-xl font-semibold mt-4">Añadir comentario</h3>
    <form method="POST" action="{{ route('comentarios.store', $articulo) }}" class="mt-3">
        @csrf
        <div class="mb-4">
            <label for="texto" class="block text-gray-700 text-sm font-semibold">Contenido:</label>
            <textarea
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-500 text-gray-700 leading-tight"
                id="texto" name="texto"></textarea>
        </div>
        <div class="mb-4">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear</button>
        </div>
    </form>
    <h3 class="text-xl font-semibold mt-4">Comentarios:</h3>
    <ul class="list-disc list-inside">
        @foreach ($articulo->comentarios as $comentario)
        <li>
            <small class="text-gray-600">{{ $comentario->created_at }}</small>:
            <span class="text-gray-800">{{ $comentario->texto }}</span>
        </li>
        @endforeach
    </ul>

    <form method="POST" action="{{ route('articulos.favorito.agregar', $articulo) }}" class="mt-4">
        @csrf
        <button type="submit"
            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Agregar
            a Favoritos</button>
    </form>


    <a href="{{ route('articulos.favoritos') }}"
        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-3 inline-block">Ver
        Favoritos</a>

    @endauth

    @guest
    <a href="{{ route('login') }}"
        class="bg-gray-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-3 inline-block">Iniciar
        sesión</a>
    @endguest

    <a href="{{ route('dashboard') }}"
        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-3 inline-block">Volver</a>
</div>
@endsection