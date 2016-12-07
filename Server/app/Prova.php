<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Prova
 *
 * @property integer $id
 * @property string $prova
 * @property integer $turma_id
 * @property integer $disciplina_id
 * @property integer $professor_id
 * @property integer $estado_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Questao[] $questoes
 * @property-read \App\Turma $turma
 * @property-read \App\Disciplina $disciplina
 * @property-read \App\Usuario $professor
 * @property-read \App\Estado $estado
 * @method static \Illuminate\Database\Query\Builder|\App\Prova whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prova whereProva($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prova whereData($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prova whereTurmaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prova whereDisciplinaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prova whereProfessorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prova whereEstadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prova whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Prova whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Prova extends Model
{
    protected $fillable = [
        'prova', 'turma_id', 'professor_id', 'disciplina_id', 'estado_id'
    ];

    const VALIDACAO = [
        'prova' => 'required',
        'turma_id' => 'required|integer|min:1',
        'disciplina_id' => 'required|integer|min:1',
        'estado_id' => 'required|integer|min:1'
    ];

    const VALIDACAO_UPDATE = [
        'turma_id' => 'integer|min:1',
        'disciplina_id' => 'integer|min:1',
        'estado_id' => 'integer|min:1'
    ];

    public function scopeWithAll($query)
    {
        $query->with('turma', 'professor', 'estado', 'disciplina');
    }

    public static function comQuantidade($provas)
    {
        $quantidade = [
            'todos'      => Prova::count(),
            'aguardando' => Prova::where('estado_id', Estado::AGUARDANDO_APROVACAO)->count(),
            'aprovados'  => Prova::where('estado_id', Estado::APROVADO)->count(),
            'recusados'  => Prova::where('estado_id', Estado::RECUSADO)->count(),
        ];

        return compact('provas', 'quantidade');
    }

    public function questoes()
    {
        return $this->belongsToMany('App\Questao');
    }

    public function turma()
    {
        return $this->belongsTo('App\Turma');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function professor()
    {
        return $this->belongsTo('App\Usuario', 'professor_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
}
