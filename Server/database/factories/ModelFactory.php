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
        'estado_id' => 1,
    ];
});
