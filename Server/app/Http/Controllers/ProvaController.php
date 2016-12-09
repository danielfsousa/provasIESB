<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Prova;
use Auth;
use Validator;
use Illuminate\Http\Request;

class ProvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (! (Auth::user()->isCoordenador() || Auth::user()->isSecretaria() || Auth::user()->isAdmin())) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        if ($request->has('estado')) {
            $provas = Prova::withAll()->where('estado_id', $request->get('estado'))->get();
        } else {
            $provas = Prova::withAll()->get();
        }

        return response()->json(Prova::comQuantidade($provas));
    }

    /**
     * Retorna todas as provas do professor ou coordenador autenticado.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAutenticado()
    {
        $id = Auth::user()->id;
        $papel = Auth::user()->papel;

        switch($papel) {

            case 'professor':
                $provas = Prova::withAll()->where('professor_id', $id)->get();
                return response()->json(compact('provas'));
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
        if (!Auth::user()->isProfessor()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        $request->request->add(['professor_id' => Auth::user()->id]);

        $validacao = Validator::make($request->all(), Prova::VALIDACAO);
        if ($validacao->fails()) {
            return response()->json(['erro' => $validacao->errors()], 400);
        }

        if(!Prova::create($request->all())) {
            return response()->json(['erro' => 'Não foi possível criar o recurso'], 500);
        }

        return response()->json(['mensagem' => 'Recurso criado com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$prova = Prova::withAllQuestoes()->find($id)) {
            return response()->json(['erro' => 'Prova não encontrada'], 404);
        }

        // Se for aluno: retorna erro (não autorizado)
        if(Auth::user()->isAluno()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        return response()->json(compact('prova'));
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
        if(!$prova = Prova::find($id)) {
            return response()->json(['erro' => 'Prova não encontrada'], 404);
        }

        $validacao = Validator::make($request->all(), Prova::VALIDACAO_UPDATE);
        if ($validacao->fails()) {
            return response()->json(['erro' => $validacao->errors()], 400);
        }

        if(!$prova->update($request->all())) {
            return response()->json(['erro' => 'Não foi possível modificar a prova'], 500);
        }

        return response()->json(['mensagem' => 'Prova modificada com sucesso'], 200);
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

        $prova = Prova::find($id);

        if(!$prova) {
            return response()->json(['erro' => 'Prova não encontrada'], 404);
        }

        if($prova->delete()) {
            return response()->json(['mensagem' => 'Prova excluída com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Erro ao excluir prova'], 500);
        }
    }

    /**
     * Coordenador aprova uma prova específica
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function aprovar($id)
    {
        if (! (Auth::user()->isCoordenador() || Auth::user()->isAdmin())) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        if(!$prova = Prova::find($id)) {
            return response()->json(['erro' => 'Prova não encontrada'], 404);
        }

        $prova->update(['estado_id' => Estado::APROVADO]);

        return response()->json(['mensagem' => 'Prova aprovada com sucesso'], 200);
    }

    /**
     * Coordenador recusa uma prova específica
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function recusar($id)
    {
        if (! (Auth::user()->isCoordenador() || Auth::user()->isAdmin())) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        if(!$prova = Prova::find($id)) {
            return response()->json(['erro' => 'Prova não encontrada'], 404);
        }

        $prova->update(['estado_id' => Estado::RECUSADO]);

        return response()->json(['mensagem' => 'Prova recusada com sucesso'], 200);
    }
}
