<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Estado
 *
 * @property integer $id
 * @property string $nome
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Prova[] $provas
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Questao[] $questoes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Recurso[] $recursos
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Nota[] $notas
 * @method static \Illuminate\Database\Query\Builder|\App\Estado whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Estado whereNome($value)
 * @mixin \Eloquent
 */
class Estado extends Model
{
    protected $fillable = [
        'nome'
    ];

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
