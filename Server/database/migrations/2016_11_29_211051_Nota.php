<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function(Blueprint $table) {
            $table->increments('id');

            $table->string('prova');
            $table->date('data');
            $table->integer('nota')->unsigned();

            $table->integer('aluno_id')->unsigned();
            $table->integer('disciplina_id')->unsigned();
            $table->integer('turma_id')->unsigned();
            $table->integer('estado_id')->unsigned();

//            $table->foreign('aluno_id')->references('id')->on('alunos');
//            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
//            $table->foreign('estado_id')->references('id')->on('estados');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
