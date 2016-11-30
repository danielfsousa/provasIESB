<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = [
        'data', 'nota', 'prova', 'turma_id', 'estado_id', 'aluno_id', 'disciplina_id'
    ];
}
