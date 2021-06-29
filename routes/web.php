<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/perfil', PerfilController::class);
Route::post('/perfil/deshabilitar', [PerfilController::class,'deshabilitar']);

Route::resource('/productos', ProductosController::class);
Route::post('/productos/eliminar', [ProductosController::class, 'eliminar']);

Route::resource('/admin', AdminController::class);
Route::post('/admin/eliminar', [AdminController::class, 'eliminar']);


require __DIR__.'/auth.php';
