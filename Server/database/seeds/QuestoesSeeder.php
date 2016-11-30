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
        factory(App\Objetiva::class, 10)->create();
        factory(App\Subjetiva::class, 10)->create();
    }
}
