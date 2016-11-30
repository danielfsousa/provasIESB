<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    protected $table = 'questoes';

    protected $fillable = [
        'titulo', 'disciplina_id', 'autor_id', 'tags', 'estado_id', 'dificuldade', 'tipo'
    ];

    public function tipo()
    {
        if ($this->tipo === 'objetiva') {
            return $this->hasOne('App\Objetiva');
        }

        else if ($this->tipo === 'subjetiva') {
            return $this->hasOne('App\Subjetiva');
        }

        return false;
    }

    public function provas()
    {
        return $this->belongsToMany('App\Provas');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function autor()
    {
        return $this->belongsTo('App\Usuario', 'autor_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
}
