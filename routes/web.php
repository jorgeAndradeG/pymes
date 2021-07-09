<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerController;

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


Route::resource('/administrador', AdminController::class);

Route::resource('/ver', VerController::class);



require __DIR__.'/auth.php';
