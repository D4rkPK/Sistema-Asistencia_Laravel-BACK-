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
Route::get('/users', 'adminUsers\UserController@index');

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

/* HORARIOS */
Route::get('/horario', 'HorarioController@index');
Route::post('/horario/create', 'HorarioController@store');
Route::get('/horario/show/{id}', 'HorarioController@show');
Route::put('/horario/update/{id}', 'HorarioController@update');
Route::delete('/horario/delete/{id}', 'HorarioController@destroy');

/* ESTUDIANTES */
Route::get('/estudiante', 'EstudianteController@index');
Route::post('/estudiante/create', 'EstudianteController@store');
Route::get('/estudiante/show/{id}', 'EstudianteController@show');
Route::put('/estudiante/update/{id}', 'EstudianteController@update');
Route::delete('/estudiante/delete/{id}', 'EstudianteController@destroy');

Route::get('/estudiante/huella', 'EstudianteController@openFingerPrint');

/* HORARIOS ASIGNADOS */
Route::get('/horario_asignado', 'HorarioAsignadoController@index');
Route::post('/horario_asignado/create', 'HorarioAsignadoController@store');
Route::get('/horario_asignado/show/{id}', 'HorarioAsignadoController@show');
Route::put('/horario_asignado/update/{id}', 'HorarioAsignadoController@update');
Route::delete('/horario_asignado/delete/{id}', 'HorarioAsignadoController@destroy');

/* REGISTRO */
Route::get('/registro', 'RegistroController@index');
Route::get('/registro/faltante', 'RegistroController@faltantes');
Route::post('/registro/create', 'RegistroController@store');
Route::get('/registro/show/{id}', 'RegistroController@show');
Route::put('/registro/update/{id}', 'RegistroController@update');
Route::delete('/registro/delete/{id}', 'RegistroController@destroy');


/* TEMP ESTUDIANTES */

Route::get('/temp_estudiante', 'TempEstudiantesController@index');
Route::post('/temp_estudiante/create', 'TempEstudiantesController@store');
Route::delete('/temp_estudiante/delete', 'TempEstudiantesController@destroy');

