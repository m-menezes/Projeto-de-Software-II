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
Route::group(['middleware' => 'auth' ], function(){
	// Admin's Routes
	Route::get('/loadchart', [				'as' => 'admin.loadchart', 	'uses' => 'admin\OportunidadeController@loadchart' ]);
	Route::get('/administrator', [ 			'as' => 'admin.index', 		'uses' => 'admin\OportunidadeController@index' ]);
	Route::get('/postagem/adicionar',[		'as' => 'admin.adicionar', 	'uses' => 'admin\OportunidadeController@adicionar']);
	Route::get('/postagem/editar/{id}', [ 	'as' => 'admin.editar', 	'uses' => 'admin\OportunidadeController@editar']);
	Route::put('/postagem/atualizar/{id}', ['as' => 'admin.atualizar',	'uses' => 'admin\OportunidadeController@atualizar']);
	Route::put('/postagem/deletarArquivo', ['as' => 'deletarArquivo',	'uses' => 'admin\OportunidadeController@deletarArquivo']);
	Route::get('/postagem/deletar/{id}', [	'as' => 'admin.deletar',	'uses' => 'admin\OportunidadeController@deletar']);
	Route::get('/postagem/publicado', [		'as' => 'admin.publicado', 	'uses' => 'admin\OportunidadeController@publicado']);
	Route::post('/postagem/save', [			'as' => 'admin.salvar', 	'uses' => 'admin\OportunidadeController@salvar']);


	Route::get('/area/adicionar', [			'as' => 'admin.novaArea', 	'uses' => 'admin\OportunidadeController@novaArea']);
	Route::get('/area/deletar/{id}',[		'as' => 'deletarArea',		'uses' => 'admin\OportunidadeController@deletarArea']);
	Route::get('/area/editar',	 [			'as' => 'editarArea',		'uses' => 'admin\OportunidadeController@editarArea']);
	Route::get('/area/atualizar/{id}',[		'as' => 'updateArea',		'uses' => 'admin\OportunidadeController@updateArea']);
	Route::post('/area/registrar', [ 		'as' => 'registerArea', 	'uses' => 'admin\OportunidadeController@registerArea']);
	
	Route::get('/curso/adicionar', [ 		'as' => 'admin.novoCurso', 	'uses' => 'admin\OportunidadeController@novoCurso']);
	Route::get('/curso/deletar/{id}',[		'as' => 'deletarCurso',		'uses' => 'admin\OportunidadeController@deletarCurso']);
	Route::get('/curso/editar',	 [			'as' => 'editarCurso',		'uses' => 'admin\OportunidadeController@editarCurso']);
	Route::get('/curso/atualizar/{id}',[	'as' => 'updateCurso',		'uses' => 'admin\OportunidadeController@updateCurso']);
	Route::post('/curso/registrar', [ 		'as' => 'registerCurso', 	'uses' => 'admin\OportunidadeController@registerCurso']);

	//Edit Password
	Route::get('/atualizar/senha', [		'as' => 'edit_pass', 		'uses' => 'usuario\ViewsController@edit_pass']);
	Route::post('/atualizar/senha/update', ['as' => 'edit_pass.update',	'uses' => 'usuario\ViewsController@edit_pass_update']);

	//Edit Name/Email
	Route::get('/atualizar/cadastro', [			'as' => 'edit_name', 		'uses' => 'usuario\ViewsController@edit_name']);
	Route::post('/atualizar/cadastro/update', [ 'as' => 'edit_name.update',	'uses' => 'usuario\ViewsController@edit_name_update']);
});

// View's Routes
Route::get('/', [ 							'as' => 'home', 			'uses' => 'usuario\ViewsController@home']);
Route::get('/sobre', [ 						'as' => 'sobre', 			'uses' => 'usuario\ViewsController@sobre']);
Route::get('/postagem/{id}', [ 				'as' => 'postagem', 		'uses' => 'usuario\ViewsController@postagem']);
Route::post('/', [  				'as' => 'getOpportunitiesByText',	'uses' => 'usuario\ViewsController@getOportunidadesByText']);
Route::get('/getCurses', [ 					'as' => 'getCurses',		'uses' => 'admin\OportunidadeController@getCursesByAreaId']);

//Apenas um teste =)
Route::get('/teste', [ 						'as' => 'teste', 			'uses' => 'usuario\ViewsController@teste']);

// Auth Routes
Route::get('/login',[						'as' => 'login', 			'uses' => 'Auth\LoginController@showLogin']);
Route::get('/logout', [						'as' => 'logout', 			'uses' => 'Auth\LoginController@logout']);
Route::get('/registerUser', [ 				'as' => 'register', 		'uses' => 'Auth\LoginController@register']);
Route::post('/doLogin',[					'as' => 'doLogin', 			'uses' => 'Auth\LoginController@doLogin']);
Route::post('/registerUser', [ 				'as' => 'registerUser', 	'uses' => 'Auth\LoginController@registerUser']);