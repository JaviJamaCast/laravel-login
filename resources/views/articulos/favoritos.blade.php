@extends('layouts.master')

@section('titulo', 'Artículos Favoritos')

@section('content')
<div class="container mx-auto py-5">
    <h1 class="text-3xl font-bold mb-3">Artículos Favoritos</h1>

    @if ($articulosFavoritos->isEmpty())
    <p>No tienes artículos favoritos.</p>
    @else
    <ul class="list-disc list-inside">
        @foreach ($articulosFavoritos as $articulo)
        <li>
            <h2 class="text-xl font-semibold">{{ $articulo->titulo }}</h2>
            <p>{{ $articulo->contenido }}</p>
        </li>
        @endforeach
    </ul>
    @endif

    <a href="{{ route('articulos.index') }}"
        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-3 inline-block">Volver</a>
</div>
@endsection
