<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('welcome');
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
