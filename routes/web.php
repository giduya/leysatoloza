<?php

use Illuminate\Support\Facades\Route;

use App\Models\Instalar;
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

  Instalar::bd();

    return view('auth.login_declarante');
});

Auth::routes(['register' => false]);

Route::match(['get','post'], '/inicio', [App\Http\Controllers\DeclaracionController::class, 'declaracion']);

Route::match(['get','post'], '/configuracion', [App\Http\Controllers\ConfigController::class, 'config']);

Route::match(['get','post'], '/declaracion/{declaracion_id}/borrar', [App\Http\Controllers\DeclaracionController::class, 'borrar']);

Route::match(['get','post'], '/declaracion/{declaracion_id}/{formato_slug?}', [App\Http\Controllers\DeclaracionController::class, 'formato']);

Route::match(['get','post'], '/declaracion/{declaracion_id}/{formato_slug}/{operacion}/{opcion?}', [App\Http\Controllers\DeclaracionController::class, 'subformato']);

Route::get('/catalogo/{catalogo}/{a?}/{b?}/{c?}', [App\Http\Controllers\DeclaracionController::class, 'catalogo']);
