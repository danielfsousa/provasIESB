<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recurso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function(Blueprint $table) {
            $table->increments('id');

            $table->string('titulo');
            $table->string('prova');
            $table->text('descricao');
            $table->integer('questao')->unsigned();

            $table->integer('aluno_id')->unsigned();
            $table->integer('disciplina_id')->unsigned();
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
//        Schema::table('recursos', function($table)
//        {
//            $table->dropForeign('aluno_id');
//            $table->dropColumn('aluno_id');
//
//            $table->dropForeign('disciplina_id');
//            $table->dropColumn('disciplina_id');
//
//            $table->dropForeign('estado_id');
//            $table->dropColumn('estado_id');
//        });

        Schema::dropIfExists('recursos');
    }
}
