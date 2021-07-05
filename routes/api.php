<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserApiController;
use App\Http\Controllers\ExampleApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [DeclaracionApiController::class, 'store'])->name('user.store');

//Route::post('login', [UserApiController::class, 'login']);

Route::any('login', [UserApiController::class, 'validate_token']);

Route::middleware('auth:api')->group(function (){
  Route::get('users', [ExampleApiController::class, 'users']);

  Route::post('logout', [UserApiController::class, 'login']);
});
