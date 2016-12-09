<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
        Schema::dropIfExists('prova_questao');
        Schema::dropIfExists('provas');
        Schema::dropIfExists('subjetivas');
        Schema::dropIfExists('objetivas');
        Schema::dropIfExists('questoes');
        Schema::dropIfExists('recursos');
        Schema::dropIfExists('estados');
        Schema::dropIfExists('turmas');
        Schema::dropIfExists('disciplinas');
        Schema::dropIfExists('usuarios');
    }
}
