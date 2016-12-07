<?php

use Illuminate\Database\Seeder;

class QuestoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Questao::class, 20)->create();
    }
}
