<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticuloController extends Controller
{


    public function index()
    {
        $articulos = Articulo::all();
        return view('articulos.index', [
            'articulos' => $articulos
        ]);
    }

    // Definición del método en el Controlador:
    public function show(Articulo $articulo)
    {
        session(['articulo_leido_' . $articulo->id => true]);
        return view('articulos.show', ['articulo' => $articulo]);
    }

    public function create()
    {
        return view('articulos.create');
    }

    public function agregarFavorito(Articulo $articulo)
    {
        // Obtén la lista de artículos favoritos del usuario desde la sesión
        $favoritos = session('articulos_favoritos', []);

        // Agrega el artículo a la lista de favoritos
        $favoritos[$articulo->id] = $articulo;

        // Almacena la lista actualizada en la sesión del usuario
        session(['articulos_favoritos' => $favoritos]);

        return redirect()->back()->with('success', 'Artículo agregado a favoritos');
    }

    public function verFavoritos()
    {
        // Obtener la lista de favoritos de la sesión con la clave correcta
        $favoritos = session('articulos_favoritos', []);
    
        // Obtener los artículos favoritos desde la base de datos utilizando los IDs almacenados en la sesión
        $articulosFavoritos = Articulo::whereIn('id', $favoritos)->get();
    
        return view('articulos.favoritos', ['articulosFavoritos' => $articulosFavoritos]);
    }
    
    public function store(Request $request)
    {
        //Validar la petición:
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string'
        ]);
        /* Si la validación falla se redirigirá al usuario 
        a la página previa. Si pasa la validación, el controlador 
        continuará ejecutándose.
        */

        // Insertar el artículo en la BBDD tras su validación.
        Articulo::create($validated);

        return redirect(route('articulos.index'));
    }

    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect(route('dashboard'));

    }

    public function edit(Articulo $articulo)
    {
        return view('articulos.edit', [
            'articulo' => $articulo
        ]);
    }

    public function update(Request $request, Articulo $articulo)
    {
        if (!Gate::allows('update-article', $articulo)) {
            abort(403);
        }
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string'
        ]);
        $articulo->update($validated);
        return redirect(route('articulos.show', $articulo));
    }
}
