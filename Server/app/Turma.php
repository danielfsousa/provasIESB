<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
        'codigo', 'disciplina_id'
    ];

    public function provas()
    {
        return $this->hasMany('App\Prova');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }
}
