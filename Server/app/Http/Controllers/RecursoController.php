<?php

namespace App\Http\Controllers;

use App\Recurso;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;
use Auth;
use Validator;

class RecursoController extends Controller
{

    /**
     * Retorna todos os recursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()->isAdmin()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        $recursos = Recurso::all();
        return response()->json(compact('recursos'));
    }

    /**
     * Retorna todos os recursos do aluno, professor ou coordenador autenticado.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAutenticado()
    {
        $id = Auth::user()->id;
        $papel = Auth::user()->papel;

        switch($papel) {

            case 'aluno':
                $recursos = Recurso::where('aluno_id', $id)->get();
                return response()->json(compact('recursos'));
            break;

            case 'professor':
                // TODO
            break;

            case 'coordenador':
                // TODO
            break;

        }

        return response()->json(['erro' => 'Não foi possível obter os recursos'], 500);
    }

    /**
     * Salva um novo recurso.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->isAluno()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        $request->request->add(['aluno_id' => Auth::user()->id]);

        $validacao = Validator::make($request->all(), [
            'titulo' => 'required',
            'prova' => 'required',
            'questao' => 'required|integer',
            'descricao' => 'required',
            'estado_id' => 'required|integer',
            'disciplina_id' => 'required|integer'
        ]);

        if ($validacao->fails()) {
            return response()->json(['erro' => $validacao->errors()], 400);
        }

        try {
            Recurso::create($request->all());
        } catch (Exception $e) {
            return response()->json(['erro' => 'Não foi possível criar o recurso'], 500);
        }

        return response()->json(['mensagem' => 'Recurso criado com sucesso'], 201);
    }

    /**
     * Retorna um recurso específico.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$recurso = Recurso::find($id)) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        $usuario_id = $recurso->aluno_id;
        $usuario_papel = Auth::user()->papel;

        // Se for aluno e o recurso não for dele: retorna erro (não autorizado)
        if($usuario_papel === 'aluno' && $usuario_id !== Auth::user()->id) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        return response()->json(compact('recurso'));

    }

    /**
     * Exclui um recurso específico
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Auth::user()->isCoordenador()) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        $recurso = Recurso::find($id);

        if(!$recurso) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        if($recurso->delete()) {
            return response()->json(['mensagem' => 'Recurso excluído com sucesso'], 200);
        } else {
            return response()->json(['erro' => 'Erro ao excluir recurso'], 500);
        }
    }
}
