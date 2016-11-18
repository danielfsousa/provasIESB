<?php

namespace App;

use App\Questao;

class Objetiva extends Questao
{

    protected $fillable = [
        'enunciado', 'alternativa_a', 'alternativa_b', 'alternativa_c', 'alternativa_d', 'alternativa_e', 'alternativa_correta'
    ];

}
