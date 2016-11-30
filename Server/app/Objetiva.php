<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objetiva extends Model
{
    protected $fillable = [
        'enunciado', 'alternativa_a', 'alternativa_b', 'alternativa_c', 'alternativa_d', 'alternativa_e', 'alternativa_correta', 'questao_id'
    ];

    public function questao()
    {
        return $this->belongsTo('App\Questao');
    }
}
