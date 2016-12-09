<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Questao
 *
 * @property integer $id
 * @property string $titulo
 * @property string $tags
 * @property string $dificuldade
 * @property string $tipo
 * @property string $enunciado
 * @property string $alternativa_a
 * @property string $alternativa_b
 * @property string $alternativa_c
 * @property string $alternativa_d
 * @property string $alternativa_e
 * @property string $resposta
 * @property integer $disciplina_id
 * @property integer $autor_id
 * @property integer $estado_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Prova[] $provas
 * @property-read \App\Disciplina $disciplina
 * @property-read \App\Usuario $autor
 * @property-read \App\Estado $estado
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereTitulo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereTags($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereDificuldade($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereTipo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereEnunciado($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereAlternativaA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereAlternativaB($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereAlternativaC($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereAlternativaD($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereAlternativaE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereResposta($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereDisciplinaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereAutorId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereEstadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Questao withAll()
 * @mixin \Eloquent
 */
class Questao extends Model
{
    protected $table = 'questoes';

    protected $fillable = [
        'titulo', 'disciplina_id', 'autor_id', 'estado_id', 'dificuldade', 'tipo', 'enunciado', 'alternativa_a',
        'alternativa_b', 'alternativa_c', 'alternativa_d', 'alternativa_e', 'resposta'
    ];

    const VALIDACAO = [
        'questao' => 'required',
        'data' => 'required|date',
        'turma_id' => 'required|integer|min:1',
        'disciplina_id' => 'required|integer|min:1',
        'estado_id' => 'required|integer|min:1'
    ];

    const VALIDACAO_UPDATE = [
        'data' => 'date',
        'turma_id' => 'integer|min:1',
        'disciplina_id' => 'integer|min:1',
        'estado_id' => 'integer|min:1'
    ];

    public static function comQuantidade($questoes)
    {
        $quantidade = [
            'todos'      => Questao::count(),
            'aguardando' => Questao::where('estado_id', Estado::AGUARDANDO_APROVACAO)->count(),
            'aprovados'  => Questao::where('estado_id', Estado::APROVADO)->count(),
            'recusados'  => Questao::where('estado_id', Estado::RECUSADO)->count(),
        ];

        return compact('quantidade', 'questoes');
    }

    public function scopeWithAll($query)
    {
        $query->with('disciplina', 'autor', 'estado');
    }

    public function provas()
    {
        return $this->belongsToMany('App\Prova', 'prova_questao', 'questao_id', 'prova_id')->withPivot('valor');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function autor()
    {
        return $this->belongsTo('App\Usuario', 'autor_id');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
}
