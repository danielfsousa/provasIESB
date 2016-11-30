<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
        'codigo', 'disciplina_id'
    ];
}
