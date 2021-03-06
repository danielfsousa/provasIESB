<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Recurso;
use App\Prova;
use Illuminate\Http\Request;
use Auth;
use Validator;

class RecursoController extends Controller
{

    /**
     * Retorna todos os recursos.
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
            $recursos = Recurso::withAll()->where('estado_id', $request->get('estado'))->get();
        } else {
            $recursos = Recurso::withAll()->get();
        }

        return response()->json(Recurso::comQuantidade($recursos));
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
                $recursos = Recurso::withAll()->where('aluno_id', $id)->get();
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
        if (! (Auth::user()->isAluno() || Auth::user()->isAdmin())) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        $validacao = Validator::make($request->all(), Recurso::VALIDACAO);
        if ($validacao->fails()) {
            return response()->json(['erro' => $validacao->errors()], 400);
        }

        $prova = $request->get('prova');
        $disciplina_id = $request->get('disciplina_id');
        $turma_id = $request->get('turma_id');

        $prova = Prova
                    ::where('disciplina_id', $disciplina_id)
                    ->where('turma_id', $turma_id)
                    ->where('prova', $prova)
                    ->where('estado_id', Estado::APROVADO)
                    ->first();

        if (!$prova) {
            return response()->json(['erro' => 'Prova não encontrada'], 404);
        }

        $recurso = $request->all();
        $recurso['aluno_id'] = Auth::user()->id;
        $recurso['prova_id'] = $prova->id;
        $recurso['estado_id'] = Estado::AGUARDANDO_APROVACAO;

        if(!Recurso::create($recurso)) {
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
        if(!$recurso = Recurso::withAll()->find($id)) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        // Se for aluno e o recurso não for dele: retorna erro (não autorizado)
        if(Auth::user()->isAluno() && $recurso->aluno_id !== Auth::user()->id) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        $prova = Prova::where('id', $recurso->prova_id)
                      ->with('questoes', 'questoes.disciplina', 'questoes.autor')->get()->toArray();

        $questao = $prova[0]['questoes'][$recurso->questao - 1];

        $recurso['questao_obj'] = $questao;

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
        if (! (Auth::user()->isCoordenador() || Auth::user()->isAdmin())) {
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

    /**
     * Professor aprova um recurso específico
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function aprovar($id)
    {
        if (! (Auth::user()->isProfessor() || Auth::user()->isCoordenador() || Auth::user()->isAdmin())) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        if(!$recurso = Recurso::find($id)) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        $recurso->update(['estado_id' => Estado::APROVADO]);

        return response()->json(['mensagem' => 'Recurso aprovado com sucesso'], 200);
    }

    /**
     * Professor recusa um recurso específico
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function recusar($id)
    {
        if (! (Auth::user()->isProfessor() || Auth::user()->isCoordenador() || Auth::user()->isAdmin())) {
            return response()->json(['erro' => 'Usuário não autorizado'], 401);
        }

        if(!$recurso = Recurso::find($id)) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }

        $recurso->update(['estado_id' => Estado::RECUSADO]);

        return response()->json(['mensagem' => 'Recurso recusado com sucesso'], 200);
    }
}
