<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NotasFK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notas', function (Blueprint $table) {
            $table->foreign('aluno_id')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');

            $table->foreign('disciplina_id')
                  ->references('id')
                  ->on('disciplinas')
                  ->onDelete('cascade');

            $table->foreign('turma_id')
                  ->references('id')
                  ->on('turmas')
                  ->onDelete('cascade');

            $table->foreign('estado_id')
                  ->references('id')
                  ->on('estados')
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
