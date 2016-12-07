<?php

use Illuminate\Database\Seeder;

class ObjetivaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Objetiva::class, 20)->create();
    }
}
