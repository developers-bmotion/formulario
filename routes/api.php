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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getData', 'Form\FormController@getData');
Route::get('getPaises', 'Form\FormController@getPaises');
Route::get('getCiudades', 'Form\FormController@getCiudades');
Route::post('solicitarEvento', 'Form\FormController@solicitarEvento');

// Route::resource('/tipo-eventos', 'Form\TipoEventoController');