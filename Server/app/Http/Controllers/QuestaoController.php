<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Questao;
use Auth;
use Validator;
use Illuminate\Http\Request;

class QuestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }
        $questoes = Questao::withAll()->get();
        return response()->json(compact('questoes'));
    }

    /**
     * Retorna todas as questões do professor ou coordenador autenticado.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAutenticado()
    {
        $id = Auth::user()->id;
        $papel = Auth::user()->papel;

        switch($papel) {

            case 'professor':
                $questoes = Questao::where('autor_id', $id)->get();
                return response()->json(compact('questoes'));
            break;

            case 'coordenador':
                // TODO
            break;

        }

        return response()->json(['erro' => 'Usuário não autorizado'], 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->isAluno()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        $validacao = Validator::make($request->all(), Questao::VALIDACAO);
        if ($validacao->fails()) {
            return response()->json(['erro' => $validacao->errors()], 400);
        }

        if(!Questao::create($request->all())) {
            return response()->json(['erro' => 'Não foi possível criar a questão'], 500);
        }

        return response()->json(['mensagem' => 'Questão criada com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$questao = Questao::find($id)) {
            return response()->json(['erro' => 'Questão não encontrada'], 404);
        }

        if(Auth::user()->isAluno()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        return response()->json(compact('questao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$questao = Questao::find($id)) {
            return response()->json(['erro' => 'Questão não encontrada'], 404);
        }

        $validacao = Validator::make($request->all(), Questao::VALIDACAO_UPDATE);
        if ($validacao->fails()) {
            return response()->json(['erro' => $validacao->errors()], 400);
        }

        if(!$questao->update($request->all())) {
            return response()->json(['erro' => 'Não foi possível modificar a questão'], 500);
        }

        return response()->json(['mensagem' => 'Questão modificada com sucesso'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->isCoordenador()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        $questao = Questao::find($id);

        if(!$questao) {
            return response()->json(['erro' => 'Questão não encontrada'], 404);
        }

        if($questao->delete()) {
            return response()->json(['mensagem' => 'Questão excluída com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Erro ao excluir questão'], 500);
        }
    }

    /**
     * Coordenador aprova uma questão específica
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function aprovar($id)
    {
        if (!Auth::user()->isCoordenador()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        if(!$questao = Questao::find($id)) {
            return response()->json(['erro' => 'Questão não encontrada'], 404);
        }

        $questao->update(['estado_id' => Estado::APROVADO]);

        return response()->json(['mensagem' => 'Prova aprovada com sucesso'], 200);
    }

    /**
     * Coordenador recusa uma questão específica
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function recusar($id)
    {
        if (!Auth::user()->isCoordenador()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        if(!$questao = Questao::find($id)) {
            return response()->json(['erro' => 'Questão não encontrada'], 404);
        }

        $questao->update(['estado_id' => Estado::RECUSADO]);

        return response()->json(['mensagem' => 'Questão recusada com sucesso'], 200);
    }
}
