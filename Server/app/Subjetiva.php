<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjetiva extends Model
{
    protected $fillable = [
        'enunciado', 'resposta', 'questao_id'
    ];

    public function questao()
    {
        return $this->belongsTo('App\Questao');
    }
}
