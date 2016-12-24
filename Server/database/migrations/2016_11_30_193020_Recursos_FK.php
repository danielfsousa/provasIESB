<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecursosFK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recursos', function (Blueprint $table) {
            $table->foreign('aluno_id')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');

            $table->foreign('disciplina_id')
                ->references('id')
                ->on('disciplinas')
                ->onDelete('cascade');

            $table->foreign('estado_id')
                ->references('id')
                ->on('estados')
                ->onDelete('cascade');

            $table->foreign('prova_id')
                ->references('id')
                ->on('provas')
                ->onDelete('cascade');

            $table->foreign('turma_id')
                ->references('id')
                ->on('turmas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
