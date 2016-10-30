<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    public $table = "usuarios";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'papel', 'matricula', 'senha',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 'created_at', 'updated_at'
    ];

    public function getAuthPassword() {
        return $this->senha;
    }

    public function isAdmin() {
        return $this->papel === 'admin';
    }

    public function isCoordenador() {
        return $this->papel === 'coordenador' || $this->papel === 'admin';
    }

    public function isSecretaria() {
        return $this->papel === 'secretaria' || $this->papel === 'admin';
    }

    public function isProfessor() {
        return $this->papel === 'professor' || $this->papel === 'admin';
    }

    public function isAluno() {
        return $this->papel === 'aluno' || $this->papel === 'admin';
    }
}
