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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('notas');
        Schema::dropIfExists('provas');
        Schema::dropIfExists('prova_questao');
        Schema::dropIfExists('subjetivas');
        Schema::dropIfExists('objetivas');
        Schema::dropIfExists('questoes');
        Schema::dropIfExists('recursos');
        Schema::dropIfExists('estados');
        Schema::dropIfExists('turmas');
        Schema::dropIfExists('disciplinas');
        Schema::dropIfExists('usuarios');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
