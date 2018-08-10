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

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
	Route::get('/home', 'AdminController@index')->name('painel-admin');
	Route::get('/cursos/{id}', 'AdminController@curso')->name('cursos-admin');
});

Route::get('/cursos', 'CursoController@index');
Route::get('/cursos/{id}', 'CursoController@show');
Route::get('/cursos/{id}/simulados/gabaritos', 'CursoController@showSimuladosGabarito');

Route::post('/simulados', 'SimuladoController@store');
Route::delete('/simulados/{id}', 'SimuladoController@destroy');

Route::get('/arquivos/{tipo}/{id}', 'ArquivoController@show');
