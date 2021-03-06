<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:api');

/*

Route::resource('carreras' , 'carrerasApiController');

Route::resource('grupos', 'GrupoApiController');

Route::resource('jugadores', 'jugadoresApiController');

Route::resource('equipos', 'EquipoApiController');
*/


Route::group(['middleware' => ['cors']], function () {

	Route::resource('carreras' , 'carrerasApiController');

	Route::resource('grupos', 'GrupoApiController');

	Route::resource('jugadores', 'jugadoresApiController');

	Route::resource('equipos', 'EquipoApiController');

});


