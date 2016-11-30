<?php

use Illuminate\Database\Seeder;

class TurmasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turmas = ['ADS12345', 'CDC12345', 'EDC12345', 'JGD12345'];

        foreach ($turmas as $i => $turma) {
            DB::table('turmas')->insert([
                'codigo' => $turma,
                'disciplina_id' => $i + 1,
            ]);
        }
    }
}
