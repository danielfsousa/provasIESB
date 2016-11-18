<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{

    protected $fillable = [
        'disciplina_id', 'questao_id', 'autor_id', 'tags', 'estado_id', 'dificuldade'
    ];

}
