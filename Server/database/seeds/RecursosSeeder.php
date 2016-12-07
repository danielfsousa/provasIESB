<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RecursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Recurso::class, 20)->create();
    }
}
