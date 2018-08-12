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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'UsuarioController@index')->middleware('auth')->name('home');
Route::get('/cursos/{id}', 'UsuarioController@curso')->middleware('auth');
Route::get('/arquivos/{tipo}/{id}', 'ArquivoController@show')->middleware('auth');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'],function () {
	Route::get('/home', 'AdminController@index')->name('painel-admin');
	Route::get('/cursos/{id}', 'AdminController@curso')->name('curso-admin');
});


Route::group(['middleware' => 'auth', 'prefix' => 'api'],function () {
	Route::get('/cursos', 'CursoController@index');
	Route::get('/cursos/{id}/simulados/gabaritos', 'CursoController@showSimuladosGabarito');

	Route::post('/simulados', 'SimuladoController@store')->middleware('admin');
	Route::delete('/simulados/{id}', 'SimuladoController@destroy')->middleware('admin');

});
