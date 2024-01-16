<?php

// En app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Articulo; // Asegúrate de importar tu modelo de Artículo

class DashboardController extends Controller
{
    public function index()
    {
        $articulos = Articulo::all(); // Asume que tienes un modelo Article
        return view('dashboard', compact('articulos'));
    }
}
