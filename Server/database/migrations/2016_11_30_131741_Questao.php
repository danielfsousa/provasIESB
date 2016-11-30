<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questoes', function(Blueprint $table) {
            $table->increments('id');

            $table->string('titulo');
            $table->string('tags');
            $table->string('dificuldade');
            $table->string('tipo');

            $table->integer('disciplina_id')->unsigned()->index();
            $table->integer('autor_id')->unsigned()->index();
            $table->integer('estado_id')->unsigned()->index();

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
        //
    }
}
