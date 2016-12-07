<?php

namespace App\Http\Controllers;

use App\Nota;
use Illuminate\Http\Request;
use Auth;
use Validator;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Auth::user()->isAdmin()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        if ($request->has('estado')) {
            $notas = Nota::withAll()->where('estado_id', $request->get('estado'))->get();
        } else {
            $notas = Nota::withAll()->get();
        }

        return response()->json(Nota::comQuantidade($notas));
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

        $validacao = Validator::make($request->all(), Nota::VALIDACAO);
        if ($validacao->fails()) {
            return response()->json(['erro' => $validacao->errors()], 400);
        }

        if(!Nota::create($request->all())) {
            return response()->json(['erro' => 'Não foi possível criar a nota'], 500);
        }

        return response()->json(['mensagem' => 'Nota criada com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$nota= Nota::withAll()->find($id)) {
            return response()->json(['erro' => 'Nota não encontrada'], 404);
        }

        $usuario_id = $nota->aluno_id;

        // Se for aluno e a nota não for dele: retorna erro (não autorizado)
        if(Auth::user()->isAluno() && $usuario_id !== Auth::user()->id) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        return response()->json(compact('nota'));
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
        if(!$nota = Nota::find($id)) {
            return response()->json(['erro' => 'Nota não encontrada'], 404);
        }

        $validacao = Validator::make($request->all(), Nota::VALIDACAO_UPDATE);
        if ($validacao->fails()) {
            return response()->json(['erro' => $validacao->errors()], 400);
        }

        if(!$nota->update($request->all())) {
            return response()->json(['erro' => 'Não foi possível modificar a nota'], 500);
        }

        return response()->json(['mensagem' => 'Nota modificada com sucesso'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->isAdmin()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        $nota = Nota::find($id);

        if(!$nota) {
            return response()->json(['erro' => 'Nota não encontrada'], 404);
        }

        if($nota->delete()) {
            return response()->json(['mensagem' => 'Nota excluída com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Erro ao excluir nota'], 500);
        }
    }
}
