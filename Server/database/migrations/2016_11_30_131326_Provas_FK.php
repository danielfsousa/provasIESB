<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProvasFK extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('provas', function (Blueprint $table) {
            $table->foreign('professor_id')
                  ->references('id')->on('usuarios')
                  ->onDelete('cascade');

            $table->foreign('disciplina_id')
                  ->references('id')->on('disciplinas')
                  ->onDelete('cascade');

            $table->foreign('turma_id')
                  ->references('id')->on('turmas')
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

    }
}
