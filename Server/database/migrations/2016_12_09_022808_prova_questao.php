<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProvaQuestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova_questao', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('prova_id')->unsigned();
            $table->integer('questao_id')->unsigned();
            $table->float('valor')->unsigned();

            $table->foreign('prova_id')->references('id')->on('provas')->onDelete('cascade');
            $table->foreign('questao_id')->references('id')->on('questoes')->onDelete('cascade');
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
