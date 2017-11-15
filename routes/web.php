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
	Route::get('/admin', [ 					'as' => 'admin.index', 		'uses' => 'admin\OportunidadeController@index' ]);
	Route::get('/admin/adicionar/postagem',['as' => 'admin.adicionar', 	'uses' => 'admin\OportunidadeController@adicionar']);
	Route::get('/admin/editar/{id}', [ 		'as' => 'admin.editar', 	'uses' => 'admin\OportunidadeController@editar']);
	Route::put('/admin/atualizar/{id}', [ 	'as' => 'admin.atualizar',	'uses' => 'admin\OportunidadeController@atualizar']);
	Route::put('/admin/deletarArquivo', [ 	'as' => 'deletarArquivo',	'uses' => 'admin\OportunidadeController@deletarArquivo']);
	Route::post('/admin/deletar', [			'as' => 'admin.deletar',	'uses' => 'admin\OportunidadeController@deletar']);
	Route::get('/admin/loadchart', [		'as' => 'admin.loadchart', 	'uses' => 'admin\OportunidadeController@loadchart' ]);
	Route::get('/admin/publicado', [		'as' => 'admin.publicado', 	'uses' => 'admin\OportunidadeController@publicado']);
	Route::post('/admin/salvar', [			'as' => 'admin.salvar', 	'uses' => 'admin\OportunidadeController@salvar']);


	Route::get('/admin/adicionar/areas', [	'as' => 'admin.novaArea', 	'uses' => 'admin\OportunidadeController@novaArea']);
	Route::post('/registerArea', [ 			'as' => 'registerArea', 	'uses' => 'admin\OportunidadeController@registerArea']);
	Route::get('/deletarArea/{id}',	 [		'as' => 'deletarArea',		'uses' => 'admin\OportunidadeController@deletarArea']);
	Route::get('/editarArea',	 [			'as' => 'editarArea',		'uses' => 'admin\OportunidadeController@editarArea']);
	Route::get('/updateArea/{id}',	 [		'as' => 'updateArea',		'uses' => 'admin\OportunidadeController@updateArea']);
	
	Route::get('/admin/adicionar/cursos', [ 'as' => 'admin.novoCurso', 	'uses' => 'admin\OportunidadeController@novoCurso']);
	Route::post('/registerCurso', [ 		'as' => 'registerCurso', 	'uses' => 'admin\OportunidadeController@registerCurso']);
	Route::get('/deletarCurso/{id}',[		'as' => 'deletarCurso',		'uses' => 'admin\OportunidadeController@deletarCurso']);
	Route::get('/editarCurso',	 [			'as' => 'editarCurso',		'uses' => 'admin\OportunidadeController@editarCurso']);
	Route::get('/updateCurso/{id}',	 [		'as' => 'updateCurso',		'uses' => 'admin\OportunidadeController@updateCurso']);

	//Edit Password
	Route::get('/atualizar-senha', [		'as' => 'edit_pass', 		'uses' => 'usuario\ViewsController@edit_pass']);
	Route::post('/atualizar-senha/update', ['as' => 'edit_pass.update',	'uses' => 'usuario\ViewsController@edit_pass_update']);

	//Edit Name/Email
	Route::get('/atualizar-cadastro', [			'as' => 'edit_name', 		'uses' => 'usuario\ViewsController@edit_name']);
	Route::post('/atualizar-cadastro/update', [ 'as' => 'edit_name.update',	'uses' => 'usuario\ViewsController@edit_name_update']);
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