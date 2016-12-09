<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Turma
 *
 * @property integer $id
 * @property string $codigo
 * @property integer $disciplina_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Prova[] $provas
 * @property-read \App\Disciplina $disciplina
 * @method static \Illuminate\Database\Query\Builder|\App\Turma whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Turma whereCodigo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Turma whereDisciplinaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Turma whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Turma whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Nota[] $notas
 * @method static \Illuminate\Database\Query\Builder|\App\Turma withAll()
 */
class Turma extends Model
{
    protected $fillable = [
        'codigo', 'disciplina_id'
    ];

    public function scopeWithAll($query)
    {
        $query->with('disciplina');
    }

    public function provas()
    {
        return $this->hasMany('App\Prova');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function notas()
    {
        return $this->hasMany('App\Nota');
    }
}
