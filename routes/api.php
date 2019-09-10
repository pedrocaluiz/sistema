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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');

Route::get('/estados', 'EstadosController@indexJson');
Route::get('/municipios/{estado}', 'MunicipiosController@indexJson');
Route::get('/unidades/{curso}', 'UnidadesController@indexJson');
Route::get('/materiais/{unidade}', 'MateriaisController@indexJson');

Route::delete('/respostas/{id}', 'RespostasController@destroyAjax');



