<?php

use Illuminate\Database\Seeder;

class Prova_QuestaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provaIds = DB::table('provas')->pluck('id');
        $questaoIds = DB::table('questoes')->pluck('id');

        $pivots = [];
        foreach($provaIds as $provaId)
        {
            $questaoIdsAleatorios = iterator_to_array($questaoIds);
            shuffle($questaoIdsAleatorios);

            for($index = 0; $index < 10; $index++) {
                $pivots[] = [
                    'prova_id' => $provaId,
                    'questao_id' => array_shift($questaoIdsAleatorios),
                    'valor' => 1
                ];
            }
        }

        DB::table('prova_questao')->insert($pivots);
    }
}
