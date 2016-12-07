<?php

use Illuminate\Database\Seeder;

class ProvasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Prova::class, 20)->create();
    }
}
