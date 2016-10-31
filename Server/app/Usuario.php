<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Usuario
 *
 * @property integer $id
 * @property string $nome
 * @property string $papel
 * @property integer $matricula
 * @property string $senha
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereNome($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario wherePapel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereMatricula($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereSenha($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Usuario whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
