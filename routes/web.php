<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/Crear', function () {
    return view('componente-productos');
})->name('Formulario.Producto');

Route::post('/Registro', [ProductosController::class, 'store'])
    ->name('Crear.Producto');

Route::get('/VerLista', [ProductosController::class, 'index'])
    ->name('Ver.Producto');

Route::post('/EliminarProducto/{id}', [ProductosController::class, 'destroy'])
    ->name('Eliminar.Producto');

Route::get('/VerListaParaActualizarProducto/{id}', [ProductosController::class, 'edit'])
    ->name('Ver.Actualizar.Producto');

Route::post('/ActualizarProducto/{id}', [ProductosController::class, 'update'])
    ->name('Actualizar.Producto');

Route::get('/VerProductosParaLosClientes', [ProductosController::class, 'view'])
    ->name('Ver.Producto.Cliente');

require __DIR__ . '/auth.php';
