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
 */
class Recurso extends Model
{
    protected $fillable = [
        'titulo', 'prova', 'questao', 'descricao', 'estado_id', 'aluno_id', 'disciplina_id'
    ];

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
