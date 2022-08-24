<?php

use Illuminate\Http\Request;
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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* AUTH */
Route::post('/login', 'adminUsers\UserController@login');
Route::post('/registro', 'adminUsers\UserController@store');

/* PUESTOS */
Route::get('/puesto', 'PuestoController@index');
Route::post('/puesto/create', 'PuestoController@store');
Route::get('/puesto/show/{id}', 'PuestoController@show');
Route::put('/puesto/update/{id}', 'PuestoController@update');
Route::delete('/puesto/delete/{id}', 'PuestoController@destroy');

Route::get('/puesto', 'PuestoController@index');
Route::post('/universidad/create', 'UniversidadController@store');
Route::get('/puesto/show', 'PuestoController@show');
Route::put('/puesto/update/{id}', 'PuestoController@update');
Route::delete('/puesto/delete/{id}', 'PuestoController@destroy');
