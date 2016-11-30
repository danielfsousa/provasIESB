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

Route::post('autenticar', 'AutenticacaoController@autenticar');


/*
|--------------------------------------------------------------------------
| Rotas protegidas por login
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'jwt.auth'], function () {

    Route::get('usuario', 'AutenticacaoController@getUsuarioAutenticado');

    Route::resource('disciplinas', 'DisciplinaController', ['only' => ['index', 'show']]);

    Route::resource('turmas', 'TurmaController', ['only' => ['index', 'show']]);

    Route::get('usuario/recursos', 'RecursoController@indexAutenticado');
    Route::resource('recursos', 'RecursoController', ['only' => ['index', 'store', 'show', 'destroy']]);

});
