<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{

    protected $fillable = [
        'titulo', 'prova', 'questao', 'descricao', 'estado_id', 'aluno_id', 'disciplina_id'
    ];

}
