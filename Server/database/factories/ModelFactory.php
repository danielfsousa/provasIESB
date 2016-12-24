<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Recurso::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->sentence(5),
        'questao' => $faker->numberBetween(1,10),
        'descricao' => $faker->text,
        'prova_id' => $faker->numberBetween(1,20),
        'turma_id' => $faker->numberBetween(1,4),
        'aluno_id' => 1,
        'disciplina_id' => $faker->biasedNumberBetween(1, 4),
        'estado_id' => collect([1, 2, 3])->random(),
    ];
});

$factory->define(App\Questao::class, function (Faker\Generator $faker) {

    $tipo = collect(['Objetiva', 'Subjetiva'])->random();

    $enunciado  = '<img class="center-block img-responsive" src="/img/questao.jpg" alt="Independência"><br>';
    $enunciado .= '<p>';
    $enunciado .= $faker->text;
    $enunciado .= '</p>';


    $questao = [
        'disciplina_id' => $faker->biasedNumberBetween(1, 4),
        'titulo' => $faker->sentence(5),
        'autor_id' => 2,
        'tags' => 'tag',
        'estado_id' => $faker->biasedNumberBetween(1, 3),
        'dificuldade' => collect(['Alta', 'Média', 'Baixa'])->random(),
        'tipo' => $tipo,
        'enunciado' => $enunciado,
    ];

    if ($tipo === 'Objetiva') {
        $corpo = [
            'alternativa_a' => $faker->sentence(5),
            'alternativa_b' => $faker->sentence(5),
            'alternativa_c' => $faker->sentence(5),
            'alternativa_d' => $faker->sentence(5),
            'alternativa_e' => $faker->sentence(5),
            'resposta' => collect(['A', 'B', 'C', 'D', 'E'])->random(),
        ];
    }

    else if ($tipo === 'Subjetiva') {
        $corpo = [
            'resposta' => $faker->text,
        ];
    }

    return array_merge($questao, $corpo);
});

$factory->define(App\Prova::class, function (Faker\Generator $faker) {
    return [
        'prova' => collect(['P1', 'P2'])->random(),
        'disciplina_id' => $faker->biasedNumberBetween(1, 4),
        'professor_id' => 2,
        'turma_id' => $faker->biasedNumberBetween(1, 4),
        'estado_id' => $faker->biasedNumberBetween(1, 3)
    ];
});

$factory->define(App\Nota::class, function (Faker\Generator $faker) {
    return [
        'prova' => collect(['P1', 'P2'])->random(),
        'nota' => $faker->biasedNumberBetween(0, 10),
        'aluno_id' => 1,
        'estado_id' => collect([4, 5])->random(),
        'disciplina_id' => $faker->biasedNumberBetween(1, 4),
        'turma_id' => $faker->biasedNumberBetween(1, 4),
    ];
});

