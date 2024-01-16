<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemones = Pokemon::all();
        return view('pokemon.index', [
            'pokemones' => $pokemones
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar la petición:
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|string|max:10',
            'ataque' => 'required|integer',
            'defensa' => 'required|integer',
            'adquisicion' => 'required|Date'
        ]);
        /* Si la validación falla se redirigirá al usuario 
        a la página previa. Si pasa la validación, el controlador 
        continuará ejecutándose.
        */

        // Insertar el artículo en la BBDD tras su validación.
        Pokemon::create($validated);

        return redirect(route('pokemon.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pokemon = Pokemon::find($id);
        return view('pokemon.show', [
            'pokemon' => $pokemon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }
}
