<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signUp');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::apiResource('usuarios', 'Api\UsuarioController')
	->middleware('auth:api')
	->names([
		'index'   => 'api.usuarios.index',
		'show'    => 'api.usuarios.show',
		'store'   => 'api.usuarios.store',
		'update'  => 'api.usuarios.update',
		'destroy' => 'api.usuarios.destroy',
	]);

Route::apiResource('corporativos', 'Api\CorporativoController')
	->middleware('auth:api')
	->names([
		'index'   => 'api.corporativos.index',
		'show'    => 'api.corporativos.show',
		'store'   => 'api.corporativos.store',
		'update'  => 'api.corporativos.update',
		'destroy' => 'api.corporativos.destroy',
	]);

Route::apiResource('empresas_corporativos', 'Api\EmpresaCorporativoController')
	->middleware('auth:api')
	->names([
		'index'   => 'api.empresas_corporativos.index',
		'show'    => 'api.empresas_corporativos.show',
		'store'   => 'api.empresas_corporativos.store',
		'update'  => 'api.empresas_corporativos.update',
		'destroy' => 'api.empresas_corporativos.destroy',
	]);	

Route::apiResource('documentos', 'Api\DocumentoController')
	->middleware('auth:api')
	->names([
		'index'   => 'api.documentos.index',
		'show'    => 'api.documentos.show',
		'store'   => 'api.documentos.store',
		'update'  => 'api.documentos.update',
		'destroy' => 'api.documentos.destroy',
	]);	

Route::apiResource('contactos_corporativos', 'Api\ContactoCorporativoController')
	->middleware('auth:api')
	->names([
		'index'   => 'api.contactos_corporativos.index',
		'show'    => 'api.contactos_corporativos.show',
		'store'   => 'api.contactos_corporativos.store',
		'update'  => 'api.contactos_corporativos.update',
		'destroy' => 'api.contactos_corporativos.destroy',
	]);	

	Route::apiResource('contratos_corporativos', 'Api\ContratoCorporativoController')
	->middleware('auth:api')
	->names([
		'index'   => 'api.contratos_corporativos.index',
		'show'    => 'api.contratos_corporativos.show',
		'store'   => 'api.contratos_corporativos.store',
		'update'  => 'api.contratos_corporativos.update',
		'destroy' => 'api.contratos_corporativos.destroy',
	]);	

	Route::apiResource('documentos_corporativos', 'Api\DocumentoCorporativoController')
	->middleware('auth:api')
	->names([
		'index'   => 'api.documentos_corporativos.index',
		'show'    => 'api.documentos_corporativos.show',
		'store'   => 'api.documentos_corporativos.store',
		'update'  => 'api.documentos_corporativos.update',
		'destroy' => 'api.documentos_corporativos.destroy',
	]);	

	

Route::get('corporativo_todo/{id}', 'Api\CorporativoController@getAll')->middleware('auth:api');
Route::get('seleccionar_documentos/{id}', 'Api\DocumentoController@seleccionar')->middleware('auth:api');
