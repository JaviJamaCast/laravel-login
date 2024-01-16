@extends('layouts.master')

@section('titulo', 'RevistApp')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <h2 class="text-2xl font-semibold leading-tight">Editar artículo:</h2>
        <form method="POST" action="{{ route('articulos.update', $articulo) }}" class="mt-3">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="titulo" name="titulo" value="{{ $articulo->titulo }}" required>
            </div>
            <div class="mb-4">
                <label for="contenido" class="block text-gray-700 text-sm font-bold mb-2">Contenido:</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contenido" name="contenido" rows="3" required>{{ $articulo->contenido }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Editar</button>
            <a href="{{ route('dashboard') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Volver</a>
        </form>
    </div>
@endsection

@section('footer', 'Javier Jamaica')
