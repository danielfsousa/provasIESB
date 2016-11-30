<?php

use Illuminate\Database\Seeder;

class DisciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplinas = ['Análise e Desenvolvimento de Sistemas', 'Ciência da Computação', 'Engenharia da Computação',
            'Jogos Digitais'];

        foreach ($disciplinas as $disciplina) {
            DB::table('disciplinas')->insert([
                'nome' => $disciplina,
            ]);
        }
    }
}
