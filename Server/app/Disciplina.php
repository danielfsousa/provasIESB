<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Disciplina
 *
 * @property integer $id
 * @property string $nome
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Disciplina[] $turmas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Prova[] $provas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Questao[] $questoes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Recurso[] $recursos
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Nota[] $notas
 * @method static \Illuminate\Database\Query\Builder|\App\Disciplina whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Disciplina whereNome($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Disciplina whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Disciplina whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Disciplina extends Model
{
    protected $fillable = [
        'nome'
    ];

    public function turmas()
    {
        return $this->hasMany('App\Disciplina');
    }

    public function provas()
    {
        return $this->hasMany('App\Prova');
    }

    public function questoes()
    {
        return $this->hasMany('App\Questao');
    }

    public function recursos()
    {
        return $this->hasMany('App\Recurso');
    }

    public function notas()
    {
        return $this->hasMany('App\Nota');
    }
}
