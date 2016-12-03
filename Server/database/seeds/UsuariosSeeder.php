<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nome' => 'Elliot Alderson',
            'papel' => 'aluno',
            'matricula' => '1',
            'senha' => bcrypt('senha'),
        ]);

        DB::table('usuarios')->insert([
            'nome' => 'Mr. Robot',
            'papel' => 'professor',
            'matricula' => '2',
            'senha' => bcrypt('senha'),
        ]);

        DB::table('usuarios')->insert([
            'nome' => 'Angela Moss',
            'papel' => 'secretaria',
            'matricula' => '3',
            'senha' => bcrypt('senha'),
        ]);

        DB::table('usuarios')->insert([
            'nome' => 'Whiterose',
            'papel' => 'coordenador',
            'matricula' => '4',
            'senha' => bcrypt('senha'),
        ]);

        DB::table('usuarios')->insert([
            'nome' => 'Tyrell Wellick',
            'papel' => 'admin',
            'matricula' => '0',
            'senha' => bcrypt('senha'),
        ]);
    }
}
