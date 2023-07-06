<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\controllerCategorias;
use App\Http\Controllers\controllerClientes;
use App\Http\Controllers\controllerProveedores;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VentaStockController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//rutas de clientes
Route::middleware(['auth', 'verified'])->group(function() {
    Route::resource('categorias', controllerCategorias::class)->names('categorias');
    Route::get('categorias-pdf', [controllerCategorias::class, 'exportPDF'])->name('categorias.pdf')->middleware('can:categorias.pdf');

    Route::resource('proveedores', controllerProveedores::class)->names('proveedores');
    Route::get('proveedores-pdf', [controllerProveedores::class, 'exportPDF'])->name('proveedores.pdf')->middleware('can:proveedores.pdf');

    Route::resource('clientes', controllerClientes::class)->names('clientes');
    Route::get('clientes-pdf', [controllerClientes::class, 'exportPDF'])->name('clientes.pdf')->middleware('can:clientes.pdf');

    Route::resource('productos', ProductoController::class)->names('productos');
    Route::get('productos-pdf', [ProductoController::class, 'exportPDF'])->name('productos.pdf')->middleware('can:productos.pdf');

    Route::resource('stocks', StockController::class)->names('stocks');
    Route::get('stocks-pdf', [StockController::class, 'exportPDF'])->name('stocks.pdf')->middleware('can:stocks.pdf');

    Route::resource('ventas', VentaController::class)->names('ventas');
    Route::get('ventas-pdf', [VentaController::class, 'exportPDF'])->name('ventas.pdf')->middleware('can:ventas.pdf');

    Route::resource('venta_stocks', VentaStockController::class)->names('venta_stocks');
    Route::get('venta_stocks-pdf', [VentaStockController::class, 'exportPDF'])->name('venta_stocks.pdf')->middleware('can:venta_stocks.pdf');

    Route::resource('usuarios', UserController::class)->names('usuarios');

    //ruta dashboard
    route::resource('dashboard', DashboardController::class)->names('dashboard');


});


require __DIR__.'/auth.php';
