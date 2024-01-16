<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ComentarioController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/articulos/{articulo}/edit', [ArticuloController::class, 'edit'])
    ->name('articulos.edit')
    ->middleware(['auth', 'verified']);
Route::put('/articulos/{articulo}', [ArticuloController::class, 'update'])
    ->name('articulos.update')
    ->middleware(['auth', 'verified']);


Route::delete('/articulos/{articulo}', [ArticuloController::class, 'destroy'])
    ->name('articulos.destroy')
    ->middleware(['auth', 'verified']);



Route::get('articulos/create', [ArticuloController::class, 'create'])
    ->name('articulos.create')
    ->middleware(['auth', 'verified']);

Route::get('articulos/{articulo}', [ArticuloController::class, 'show'])
    ->name('articulos.show');

Route::post('articulos/', [ArticuloController::class, 'store'])
    ->name('articulos.store')
    ->middleware(['auth', 'verified']);


Route::post('articulos/{articulo}/comentarios', [ComentarioController::class, 'store'])
    ->name('comentarios.store');

Route::post('articulos/{articulo}/favoritos/agregar', [ArticuloController::class, 'agregarFavorito'])
    ->name('articulos.favorito.agregar');

Route::get('articulos/favoritos', [ArticuloController::class, 'verFavoritos'])
    ->name('articulos.favoritos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('articulos', [ArticuloController::class, 'index'])
    ->name('articulos.index');

require __DIR__ . '/auth.php';
