<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cargos', 'CargosController@index')->name('cargos');
Route::get('/agencias', 'AgenciasController@index')->name('agencias');
Route::get('/funcoes', 'FuncoesController@index')->name('funcoes');
Route::get('/categorias', 'CategoriasController@index')->name('categorias');
Route::get('/perfis', 'PerfisController@index')->name('perfis');
Route::get('/tipodoc', 'TipoDocsController@index')->name('tipodoc');
Route::get('/tipomat', 'TipoMateriaisController@index')->name('tipomaterial');