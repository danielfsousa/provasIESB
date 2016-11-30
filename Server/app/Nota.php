<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
