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
    Route::get('recursos/{recurso}/aprovar', 'RecursoController@aprovar');
    Route::get('recursos/{recurso}/recusar', 'RecursoController@recusar');

    Route::get('usuario/provas', 'ProvaController@indexAutenticado');
    Route::resource('provas', 'ProvaController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::get('provas/{prova}/aprovar', 'ProvaController@aprovar');
    Route::get('provas/{prova}/recusar', 'ProvaController@recusar');

    Route::get('usuario/questoes', 'QuestaoController@indexAutenticado');
    Route::resource('questoes', 'QuestaoController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::get('questoes/{questao}/aprovar', 'QuestaoController@aprovar');
    Route::get('questoes/{questao}/recusar', 'QuestaoController@recusar');

    Route::get('usuario/notas', 'notaController@indexAutenticado');
    Route::resource('notas', 'NotaController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

});
