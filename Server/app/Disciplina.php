<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
