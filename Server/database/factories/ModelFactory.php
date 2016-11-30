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
        'prova' => collect(['P1', 'P2'])->random(),
        'questao' => $faker->numberBetween(1,10),
        'descricao' => $faker->text,
        'aluno_id' => 1,
        'disciplina_id' => 1,
        'estado_id' => collect([1, 2, 3])->random(),
    ];
});

$factory->define(App\Objetiva::class, function (Faker\Generator $faker) {
    return [
        'disciplina_id' => 1,
        'titulo' => $faker->sentence(5),
        'autor_id' => 2,
        'tags' => 'tag',
        'estado_id' => collect([1, 2, 3])->random(),
        'dificuldade' => collect(['Alta', 'Média', 'Baixa'])->random(),
        'enunciado' => $faker->text,
        'alternativa_a' => $faker->sentence(5),
        'alternativa_b' => $faker->sentence(5),
        'alternativa_c' => $faker->sentence(5),
        'alternativa_d' => $faker->sentence(5),
        'alternativa_e' => $faker->sentence(5),
        'alternativa_correta' => collect(['a', 'b', 'c', 'd', 'e'])->random(),
    ];
});

$factory->define(App\Subjetiva::class, function (Faker\Generator $faker) {
    return [
        'disciplina_id' => 1,
        'titulo' => $faker->sentence(5),
        'autor_id' => 2,
        'tags' => 'tag',
        'estado_id' => collect([1, 2, 3])->random(),
        'dificuldade' => collect(['Alta', 'Média', 'Baixa'])->random(),
        'enunciado' => $faker->text,
        'resposta' => $faker->text
    ];
});

$factory->define(App\Prova::class, function (Faker\Generator $faker) {
    return [
        'prova' => collect(['P1', 'P2'])->random(),
        'data' => $faker->date(),
        'disciplina_id' => 1,
        'professor_id' => 2,
        'turma_id' => 1,
        'estado_id' => collect([1, 2, 3])->random(),
    ];
});

$factory->define(App\Nota::class, function (Faker\Generator $faker) {
    return [
        'prova' => collect(['P1', 'P2'])->random(),
        'data' => $faker->date(),
        'nota' => $faker->biasedNumberBetween(0, 10),
        'aluno_id' => 1,
        'estado_id' => collect([1, 2, 3])->random(),
        'disciplina_id' => 1,
        'turma_id' => 1,
    ];
});
