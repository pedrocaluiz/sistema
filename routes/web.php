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

Route::get('/', 'UsersController@welcome')->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::prefix('agencias')->name('agencias')->middleware('auth')->group(function () {
  Route::get('/', 'AgenciasController@index');
  Route::get('/create', 'AgenciasController@create')->name('.create');
  Route::post('/', 'AgenciasController@store')->name('.store');
  Route::delete('/destroy', 'AgenciasController@destroy')->name('.destroy');
  Route::get('/{id}/edit', 'AgenciasController@edit')->name('.edit');
  Route::put('/{id}', 'AgenciasController@update')->name('.update');
});

Route::prefix('cargos')->name('cargos')->middleware('auth')->group(function () {
    Route::get('/', 'CargosController@index');
    Route::get('/create', 'CargosController@create')->name('.create');
    Route::post('/', 'CargosController@store')->name('.store');
    Route::delete('/destroy', 'CargosController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'CargosController@edit')->name('.edit');
    Route::put('/{id}', 'CargosController@update')->name('.update');
});

Route::prefix('categorias')->name('categorias')->middleware('auth')->group(function () {
    Route::get('/', 'CategoriasController@index');
    Route::get('/create', 'CategoriasController@create')->name('.create');
    Route::post('/', 'CategoriasController@store')->name('.store');
    Route::delete('/destroy', 'CategoriasController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'CategoriasController@edit')->name('.edit');
    Route::put('/{id}', 'CategoriasController@update')->name('.update');
});

Route::prefix('funcoes')->name('funcoes')->middleware('auth')->group(function () {
    Route::get('/', 'FuncoesController@index');
    Route::get('/create', 'FuncoesController@create')->name('.create');
    Route::post('/', 'FuncoesController@store')->name('.store');
    Route::delete('/destroy', 'FuncoesController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'FuncoesController@edit')->name('.edit');
    Route::put('/{id}', 'FuncoesController@update')->name('.update');
});


/*Route::prefix('tipodoc')->name('tipodoc')->middleware('auth')->group(function () {
    Route::get('/', 'TipoDocsController@index');
    Route::get('/create', 'TipoDocsController@create')->name('.create');
    Route::post('/', 'TipoDocsController@store')->name('.store');
    Route::delete('/destroy', 'TipoDocsController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'TipoDocsController@edit')->name('.edit');
    Route::put('/{id}', 'TipoDocsController@update')->name('.update');
});

Route::prefix('tipomat')->name('tipomat')->middleware('auth')->group(function () {
    Route::get('/', 'TipoMateriaisController@index');
    Route::get('/create', 'TipoMateriaisController@create')->name('.create');
    Route::post('/', 'TipoMateriaisController@store')->name('.store');
    Route::delete('/destroy', 'TipoMateriaisController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'TipoMateriaisController@edit')->name('.edit');
    Route::put('/{id}', 'TipoMateriaisController@update')->name('.update');
});*/

Route::prefix('cursos')->name('cursos')->middleware('auth')->group(function () {
    Route::get('/', 'CursosController@index');
    Route::get('/create', 'CursosController@create')->name('.create');
    Route::post('/', 'CursosController@store')->name('.store');
    Route::get('/{id}', 'CursosController@show')->name('.show');
    Route::delete('/destroy', 'CursosController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'CursosController@edit')->name('.edit');
    Route::put('/{id}', 'CursosController@update')->name('.update');
    Route::post('/{curso_id}/pdf', 'CursosController@certificadoCurso')->name('.pdf');
    Route::get('/{curso_id}/rating', 'CursosController@rating')->name('.rating');
    Route::get('/{curso_id}/ratings', 'CursosController@ratings')->name('.ratings');
    Route::post('/rating', 'CursosController@ratingSave')->name('.rating-save');

});

Route::get('/cursos-administrador', 'CursosController@indexAdm')->name('cursos.index-adm')->middleware('auth');
Route::post('/cursos/enable/{id}', 'CursosController@enable')->name('cursos.enable')->middleware('auth');
Route::post('/cursos/disable/{id}', 'CursosController@disable')->name('cursos.disable')->middleware('auth');

Route::get('/todos-cursos', 'CursosController@todosCursos')->name('todos-cursos');
Route::post('/cursos/buscar', 'CursosController@buscar')->name('cursos.buscar');

Route::prefix('meus-cursos')->name('meus-cursos')->middleware('auth')->group(function () {
    Route::get('/', 'CursosController@meusCursos');
    Route::get('/andamento', 'CursosController@andamento')->name('.andamento');
    Route::get('/concluidos', 'CursosController@concluidos')->name('.concluidos');
});



Route::prefix('unidades')->name('unidades')->middleware('auth')->group(function () {
    Route::get('/', 'UnidadesController@index');
    Route::get('/create', 'UnidadesController@create')->name('.create');
    Route::post('/', 'UnidadesController@store')->name('.store');
    Route::get('/{id}', 'UnidadesController@show')->name('.show');
    Route::delete('/destroy', 'UnidadesController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'UnidadesController@edit')->name('.edit');
    Route::put('/{id}', 'UnidadesController@update')->name('.update');
});

Route::prefix('materiais')->name('materiais')->middleware('auth')->group(function () {
    Route::get('/', 'MateriaisController@index');
    Route::get('/create', 'MateriaisController@create')->name('.create');
    Route::post('/', 'MateriaisController@store')->name('.store');
    Route::delete('/destroy', 'MateriaisController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'MateriaisController@edit')->name('.edit');
    Route::put('/{id}', 'MateriaisController@update')->name('.update');
});

Route::prefix('questoes')->name('questoes')->middleware('auth')->group(function () {
    Route::get('/', 'QuestoesController@index');
    Route::get('/create', 'QuestoesController@create')->name('.create');
    Route::post('/', 'QuestoesController@store')->name('.store');
    Route::delete('/destroy', 'QuestoesController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'QuestoesController@edit')->name('.edit');
    Route::put('/{id}', 'QuestoesController@update')->name('.update');
});

Route::prefix('provas')->name('provas')->middleware('auth')->group(function () {
    Route::get('/{id}', 'QuestoesController@show')->name('.show');
    Route::post('/concluir', 'QuestoesController@concluirProva')->name('.concluir');
    Route::get('/{id}/lista', 'QuestoesController@listarProvas')->name('.lista');
    Route::get('/{id}/revisao', 'QuestoesController@revisarProvas')->name('.revisar');
});

Route::post('/inscrever/material', 'MateriaisController@inscrever')->middleware('auth');
Route::post('/concluir/material', 'MateriaisController@concluir')->middleware('auth');
Route::post('/inscrever/curso', 'CursosController@inscrever')->middleware('auth');
Route::get('/download-material/{id}', 'UnidadesController@download')->middleware('auth');



Route::prefix('usuarios')->name('usuarios')->middleware('auth')->group(function () {
    Route::get('/', 'UsersController@index');
    Route::get('/relatorio/{user_id}', 'UsersController@relatorioUser')->name('.relatorio.user');
    Route::get('/relatorio-pdf/{user_id}', 'UsersController@relatorioUserPdf')->name('.relatorio.pdf');
    Route::get('/relatorio/{user_id}/curso/{curso_id}', 'UsersController@relatorioCurso')->name('.relatorio.curso');
    Route::get('/meu-perfil/{user_id}', 'UsersController@meuPerfil')->name('.meu-perfil');
    Route::post('/instrutor/{id}', 'UsersController@instrutor')->name('.instrutor');
    Route::post('/aluno/{id}', 'UsersController@aluno')->name('.aluno');
    Route::delete('/delete', 'UsersController@destroy')->name('.destroy');
    Route::get('/{id}/edit', 'UsersController@edit')->name('.edit');
    Route::put('/{id}', 'UsersController@update')->name('.update');
});

/*
Route::get('/admin', function (){
    return view('adminlte');
});

Route::get('/AdminLTE/index.html', function (){
    return redirect('admin');
});
*/



