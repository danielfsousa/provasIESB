<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Objetiva
 *
 * @property integer $id
 * @property string $enunciado
 * @property string $alternativa_a
 * @property string $alternativa_b
 * @property string $alternativa_c
 * @property string $alternativa_d
 * @property string $alternativa_e
 * @property string $alternativa_correta
 * @property integer $questao_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Questao $questao
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereEnunciado($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereAlternativaA($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereAlternativaB($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereAlternativaC($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereAlternativaD($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereAlternativaE($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereAlternativaCorreta($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereQuestaoId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Objetiva whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
