<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DisciplinasSeeder::class);
        $this->call(TurmasSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(QuestoesSeeder::class);
        $this->call(ProvasSeeder::class);
        $this->call(RecursosSeeder::class);
        $this->call(NotasSeeder::class);
        $this->call(Prova_QuestaoSeeder::class);
    }
}
