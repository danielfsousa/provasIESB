<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Nota
 *
 * @property integer $id
 * @property string $prova
 * @property string $data
 * @property integer $nota
 * @property integer $aluno_id
 * @property integer $disciplina_id
 * @property integer $turma_id
 * @property integer $estado_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Estado $estado
 * @property-read \App\Usuario $aluno
 * @property-read \App\Disciplina $disciplina
 * @method static \Illuminate\Database\Query\Builder|\App\Nota whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Nota whereProva($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Nota whereData($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Nota whereNota($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Nota whereAlunoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Nota whereDisciplinaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Nota whereTurmaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Nota whereEstadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Nota whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Nota whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Nota extends Model
{
    protected $fillable = [
        'data', 'nota', 'prova', 'turma_id', 'estado_id', 'aluno_id', 'disciplina_id'
    ];

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function aluno()
    {
        return $this->belongsTo('App\Usuario', 'aluno_id');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }
}
