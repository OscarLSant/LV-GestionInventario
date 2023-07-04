<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\controllerCategorias;
use App\Http\Controllers\controllerClientes;
use App\Http\Controllers\controllerProveedores;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
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

//rutas de clientes
Route::middleware(['auth', 'verified'])->group(function() {
    Route::resource('categorias', controllerCategorias::class);
    Route::get('categorias-pdf', [controllerCategorias::class, 'exportPDF'])->name('categorias.pdf');

    Route::resource('proveedores', controllerProveedores::class);
    Route::get('proveedores-pdf', [controllerProveedores::class, 'exportPDF'])->name('proveedores.pdf');

    Route::resource('clientes', controllerClientes::class);
    Route::get('clientes-pdf', [controllerClientes::class, 'exportPDF'])->name('clientes.pdf');

    Route::resource('productos', ProductoController::class);
    Route::get('productos-pdf', [ProductoController::class, 'exportPDF'])->name('productos.pdf');

});

require __DIR__.'/auth.php';
