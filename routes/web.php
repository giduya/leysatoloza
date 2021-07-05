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

  if(CARPETA == "local")
  {
    return view('landing');
  }
  else
  {
    return view('auth.login_declarante');
  }
});

Auth::routes(['register' => false]);

Route::match(['get','post'], '/inicio', [App\Http\Controllers\DeclaracionController::class, 'declaracion']);

Route::match(['get','post'], '/configuracion', [App\Http\Controllers\ConfigController::class, 'config']);

Route::match(['get','post'], '/declaracion/{declaracion_id}/borrar', [App\Http\Controllers\DeclaracionController::class, 'borrar']);

Route::match(['get','post'], '/declaracion/{declaracion_id}/{formato_slug?}', [App\Http\Controllers\DeclaracionController::class, 'formato']);

Route::match(['get','post'], '/declaracion/{declaracion_id}/{formato_slug}/{operacion}/{opcion?}', [App\Http\Controllers\DeclaracionController::class, 'subformato']);

Route::get('/catalogo/{catalogo}/{a?}/{b?}/{c?}', [App\Http\Controllers\DeclaracionController::class, 'catalogo']);

// public routes
Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/v2/login', 'App\Http\Controllers\DeclaracionApiController@login')->name('login.api');

    //
    Route::middleware('auth:api')->group(function () {
        Route::get('/v2/declaraciones', 'App\Http\Controllers\DeclaracionApiController@index');
        Route::post('/v2/logout', 'App\Http\Controllers\DeclaracionApiController@logout')->name('logout.api');
    });
});
