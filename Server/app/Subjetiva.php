<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subjetiva
 *
 * @property integer $id
 * @property string $enunciado
 * @property string $resposta
 * @property integer $questao_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Questao $questao
 * @method static \Illuminate\Database\Query\Builder|\App\Subjetiva whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subjetiva whereEnunciado($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subjetiva whereResposta($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subjetiva whereQuestaoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subjetiva whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Subjetiva whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
