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


// Pages that NEED authentication to be accessed
Route::group(['middleware' => 'auth' ], function()
{

	// Admin's Routes
	Route::get('/admin/index', [
		'as' => 'admin.index', 'uses' => 'admin\OportunidadeController@index'
		]);

	Route::get('/admin/adicionar', [
		'as' => 'admin.adicionar', 'uses' => 'admin\OportunidadeController@adicionar'
		]);

	Route::get('/admin/editar/{id}', 
		['as' => 'admin.editar', 'uses' => 'admin\OportunidadeController@editar'
		]);

	Route::put('/admin/atualizar/{id}', [
		'as' => 'admin.atualizar', 'uses' => 'admin\OportunidadeController@atualizar'
		]);

	Route::get('/admin/deletar/{id}', [
		'as' => 'admin.deletar', 'uses' => 'admin\OportunidadeController@deletar'
		]);

	Route::post('/admin/salvar', [
		'as' => 'admin.salvar', 'uses' => 'admin\OportunidadeController@salvar'
		]);
});

// View's Routes
Route::get('/', [
	'as' => 'home', 'uses' => 'usuario\ViewsController@home'
	]);

Route::get('/sobre', [
	'as' => 'sobre', 'uses' => 'usuario\ViewsController@sobre'
	]);

Route::get('/postagem/{id}', [
	'as' => 'postagem', 'uses' => 'usuario\ViewsController@postagem'
	]);


// Auth Routes
Route::get('/login',[
	'as' => 'login', 'uses' => 'Auth\LoginController@showLogin'
	]);

Route::post('/doLogin',[
	'as' => 'doLogin', 'uses' => 'Auth\LoginController@doLogin'
	]);

Route::get('/registerUser', [
	'as' => 'register', 'uses' => 'Auth\LoginController@register'
	]);

Route::post('/registerUser', [
	'as' => 'registerUser', 'uses' => 'Auth\LoginController@registerUser'
	]);

Route::get('/logout', [
	'as' => 'logout', 'uses' => 'Auth\LoginController@logout'
	]);
