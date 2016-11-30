<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    protected $fillable = [
        'prova', 'data', 'turma_id', 'professor_id', 'disciplina_id', 'estado_id'
    ];

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
