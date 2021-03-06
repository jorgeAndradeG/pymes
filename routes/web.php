<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AdminSoporteController;
use App\Http\Controllers\DetalleProductoController;
use App\Http\Controllers\VerPymeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::resource('/', InicioController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/perfil', PerfilController::class);
Route::post('/perfil/deshabilitar', [PerfilController::class,'deshabilitar']);

Route::resource('/productos', ProductosController::class);
Route::post('/productos/eliminar', [ProductosController::class, 'eliminar']);

Route::resource('/admin', AdminController::class);
Route::post('/admin/eliminar', [AdminController::class, 'eliminar']);

Route::resource('/soporte', SoporteController::class);

Route::resource('/administracion', AdminSoporteController::class);

Route::resource('/usuarios', UsuariosController::class);
Route::post('/usuarios/deshabilitar',[UsuariosController::class,'deshabilitar']);

Route::resource('/reporte',ReportesController::class);

Route::resource('/pyme', VerPymeController::class);

Route::resource('/DetalleProducto', DetalleProductoController::class);

require __DIR__.'/auth.php';
