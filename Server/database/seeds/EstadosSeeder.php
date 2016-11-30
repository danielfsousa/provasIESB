<?php

use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $estados = ['Aguardando aprovação', 'Aceito', 'Recusado'];

        foreach ($estados as $estado) {
            DB::table('estados')->insert([
                'nome' => $estado,
            ]);
        }
    }
}
