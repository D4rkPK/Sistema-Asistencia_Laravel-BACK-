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


/* UNIVERSIDADES */
Route::get('/universidad', 'UniversidadController@index');
Route::post('/universidad/create', 'UniversidadController@store');
Route::get('/universidad/show/{id}', 'UniversidadController@show');
Route::put('/universidad/update/{id}', 'UniversidadController@update');
Route::delete('/universidad/delete/{id}', 'UniversidadController@destroy');


/* AREAS */
Route::get('/area', 'AreaController@index');
Route::post('/area/create', 'AreaController@store');
Route::get('/area/show/{id}', 'AreaController@show');
Route::put('/area/update/{id}', 'AreaController@update');
Route::delete('/area/delete/{id}', 'AreaController@destroy');
