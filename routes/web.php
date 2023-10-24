<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('departamentos', App\Http\Controllers\DepartamentoController::class);
Route::resource('entidadEmisoras', App\Http\Controllers\EntidadEmisoraController::class);
Route::resource('Marca', App\Http\Controllers\MarcaEmisoraController::class);
Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::resource('ciudads', App\Http\Controllers\CiudadController::class);
Route::resource('articulos', App\Http\Controllers\ArticuloController::class);
Route::resource('Formapagos', App\Http\Controllers\PagosController::class);
Route::resource('sucursal', App\Http\Controllers\SucursalController::class);
Route::resource('ventas', App\Http\Controllers\VentasController::class);
Route::resource('apertura_cierre', App\Http\Controllers\AperturaController::class);
