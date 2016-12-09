<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Recurso
 *
 * @property integer $id
 * @property string $titulo
 * @property string $prova
 * @property string $descricao
 * @property integer $questao
 * @property integer $aluno_id
 * @property integer $disciplina_id
 * @property integer $estado_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso whereTitulo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso whereProva($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso whereDescricao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso whereQuestao($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso whereAlunoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso whereDisciplinaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso whereEstadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Estado $estado
 * @property-read \App\Usuario $aluno
 * @property-read \App\Disciplina $disciplina
 * @method static \Illuminate\Database\Query\Builder|\App\Recurso withAll()
 */
class Recurso extends Model
{
    protected $fillable = [
        'titulo', 'prova', 'questao', 'descricao', 'estado_id', 'aluno_id', 'disciplina_id'
    ];

    const VALIDACAO = [
        'titulo' => 'required',
        'prova' => 'required',
        'questao' => 'required|integer|min:1',
        'descricao' => 'required',
        'estado_id' => 'required|integer|min:1',
        'disciplina_id' => 'required|integer|min:1'
    ];

    public static function comQuantidade($recursos)
    {
        $quantidade = [
            'todos'      => Recurso::count(),
            'aguardando' => Recurso::where('estado_id', Estado::AGUARDANDO_APROVACAO)->count(),
            'aprovados'  => Recurso::where('estado_id', Estado::APROVADO)->count(),
            'recusados'  => Recurso::where('estado_id', Estado::RECUSADO)->count(),
        ];

        return compact('quantidade', 'recursos');
    }

    public function scopeWithAll($query)
    {
        $query->with('aluno', 'estado', 'disciplina');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function aluno()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }
}
