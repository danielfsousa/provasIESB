<?php

use Illuminate\Database\Seeder;

class SubjetivaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subjetiva::class, 10)->create();
    }
}
