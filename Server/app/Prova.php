<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prova extends Model
{
    protected $fillable = [
        'prova', 'data', 'estado_id', 'turma_id', 'professor_id', 'disciplina_id'
    ];
}
