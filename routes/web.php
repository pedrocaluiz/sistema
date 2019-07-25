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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('agencias')->name('agencias')->group(function () {
  Route::get('/', 'AgenciasController@index');
  Route::get('/create', 'AgenciasController@create')->name('.create');
  Route::post('/', 'AgenciasController@store')->name('.store');
  Route::delete('/{id}', 'AgenciasController@destroy')->name('.destroy');
  Route::get('/{id}/edit', 'AgenciasController@edit')->name('.edit');
  Route::put('/{id}', 'AgenciasController@update')->name('.update');
});

Route::prefix('cargos')->name('cargos')->group(function () {
    Route::get('/', 'CargosController@index');
    Route::get('/create', 'CargosController@create')->name('.create');
    Route::post('/', 'CargosController@store')->name('.store');
    Route::delete('/{id}', 'CargosController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'CargosController@edit')->name('.edit');
    Route::put('/{id}', 'CargosController@update')->name('.update');
});

Route::prefix('categorias')->name('categorias')->group(function () {
    Route::get('/', 'CategoriasController@index');
    Route::get('/create', 'CategoriasController@create')->name('.create');
    Route::post('/', 'CategoriasController@store')->name('.store');
    Route::delete('/{id}', 'CategoriasController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'CategoriasController@edit')->name('.edit');
    Route::put('/{id}', 'CategoriasController@update')->name('.update');
});

Route::prefix('funcoes')->name('funcoes')->group(function () {
    Route::get('/', 'FuncoesController@index');
    Route::get('/create', 'FuncoesController@create')->name('.create');
    Route::post('/', 'FuncoesController@store')->name('.store');
    Route::delete('/{id}', 'FuncoesController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'FuncoesController@edit')->name('.edit');
    Route::put('/{id}', 'FuncoesController@update')->name('.update');
});

Route::prefix('perfis')->name('perfis')->group(function () {
    Route::get('/', 'PerfisController@index');
    Route::get('/create', 'PerfisController@create')->name('.create');
    Route::post('/', 'PerfisController@store')->name('.store');
    Route::delete('/{id}', 'PerfisController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'PerfisController@edit')->name('.edit');
    Route::put('/{id}', 'PerfisController@update')->name('.update');
});

Route::prefix('tipodoc')->name('tipodoc')->group(function () {
    Route::get('/', 'TipoDocsController@index');
    Route::get('/create', 'TipoDocsController@create')->name('.create');
    Route::post('/', 'TipoDocsController@store')->name('.store');
    Route::delete('/{id}', 'TipoDocsController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'TipoDocsController@edit')->name('.edit');
    Route::put('/{id}', 'TipoDocsController@update')->name('.update');
});

Route::prefix('tipomat')->name('tipomat')->group(function () {
    Route::get('/', 'TipoMateriaisController@index');
    Route::get('/create', 'TipoMateriaisController@create')->name('.create');
    Route::post('/', 'TipoMateriaisController@store')->name('.store');
    Route::delete('/{id}', 'TipoMateriaisController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'TipoMateriaisController@edit')->name('.edit');
    Route::put('/{id}', 'TipoMateriaisController@update')->name('.update');
});

Route::prefix('cursos')->name('cursos')->group(function () {
    Route::get('/', 'CursosController@index');
    Route::get('/create', 'CursosController@create')->name('.create');
    Route::post('/', 'CursosController@store')->name('.store');
    Route::get('/{id}', 'CursosController@show')->name('.show');
    Route::delete('/{id}', 'CursosController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'CursosController@edit')->name('.edit');
    Route::put('/{id}', 'CursosController@update')->name('.update');
});

Route::prefix('unidades')->name('unidades')->group(function () {
    Route::get('/', 'UnidadesController@index');
    Route::get('/create', 'UnidadesController@create')->name('.create');
    Route::post('/', 'UnidadesController@store')->name('.store');
    Route::get('/{id}', 'UnidadesController@show')->name('.show');
    Route::delete('/{id}', 'UnidadesController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'UnidadesController@edit')->name('.edit');
    Route::put('/{id}', 'UnidadesController@update')->name('.update');
});

Route::prefix('materiais/instrutor')->name('materiais.instrutor')->group(function () {
    Route::get('/', 'MateriaisController@index');
    Route::get('/create', 'MateriaisController@create')->name('.create');
    Route::post('/', 'MateriaisController@store')->name('.store');
    Route::delete('/{id}', 'MateriaisController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'MateriaisController@edit')->name('.edit');
    Route::put('/{id}', 'MateriaisController@update')->name('.update');
});

Route::prefix('questoes')->name('questoes')->group(function () {
    Route::get('/', 'QuestoesController@index');
    Route::get('/create', 'QuestoesController@create')->name('.create');
    Route::post('/', 'QuestoesController@store')->name('.store');

    Route::delete('/{id}', 'QuestoesController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'QuestoesController@edit')->name('.edit');
    Route::put('/{id}', 'QuestoesController@update')->name('.update');
});

Route::prefix('provas')->name('provas')->group(function () {
    Route::get('/{id}', 'QuestoesController@show')->name('.show');
    Route::post('/concluir', 'QuestoesController@concluirProva')->name('.concluir');
    Route::get('/{id}/lista', 'QuestoesController@listarProvas')->name('.lista');
    Route::get('/{id}/revisao', 'QuestoesController@revisarProvas')->name('.revisar');
});



Route::post('/inscrever/material', 'MateriaisController@inscrever');
Route::post('/concluir/material', 'MateriaisController@concluir');
Route::post('/inscrever/curso', 'CursosController@inscrever');
Route::get('/download-material/{id}', 'UnidadesController@download');

Route::prefix('meus-cursos')->name('meus-cursos')->group(function () {
    Route::get('/', 'CursosController@meusCursos');
    Route::get('/andamento', 'CursosController@andamento')->name('.andamento');
    Route::get('/concluidos', 'CursosController@concluidos')->name('.concluidos');
});

Route::get('/todos-cursos', 'CursosController@todosCursos')->name('todos-cursos');


Route::prefix('usuarios')->name('usuarios')->group(function () {
    Route::get('/', 'UsersController@index');
    Route::get('/relatorio/{user_id}', 'UsersController@relatorioUser')->name('.relatorio.user');
    Route::get('/relatorio/{user_id}/curso/{curso_id}', 'UsersController@relatorioCurso')->name('.relatorio.curso');
});


Route::get('/admin', function (){
    return view('adminlte');
});

Route::get('/AdminLTE/index.html', function (){
    return redirect('admin');
});



