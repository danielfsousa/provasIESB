<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Subjetiva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjetivas', function(Blueprint $table) {
            $table->increments('id');

            $table->string('titulo');
            $table->string('tags');
            $table->string('dificuldade');
            $table->text('enunciado');
            $table->text('resposta');

            $table->integer('disciplina_id')->unsigned();
            $table->integer('autor_id')->unsigned();
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
        Schema::dropIfExists('subjetivas');
    }
}
