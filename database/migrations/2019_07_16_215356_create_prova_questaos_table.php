<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvaQuestaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova_questao', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('prova_id')->unsigned()->nullable()->default(null);
            $table->foreign('prova_id')->references('id')->on('provas');
            $table->bigInteger('questao_id')->unsigned()->nullable()->default(null);
            $table->foreign('questao_id')->references('id')->on('questoes');
            $table->decimal('notaQuestao', '5', '2')->nullable()->default(null);


            $table->bigInteger('resposta_id_1')->unsigned()->nullable()->default(null);
            $table->foreign('resposta_id_1')->references('id')->on('respostas');

            $table->bigInteger('resposta_id_2')->unsigned()->nullable()->default(null);
            $table->foreign('resposta_id_2')->references('id')->on('respostas');

            $table->bigInteger('resposta_id_3')->unsigned()->nullable()->default(null);
            $table->foreign('resposta_id_3')->references('id')->on('respostas');

            $table->bigInteger('resposta_id_4')->unsigned()->nullable()->default(null);
            $table->foreign('resposta_id_4')->references('id')->on('respostas');

            $table->bigInteger('resposta_id_5')->unsigned()->nullable()->default(null);
            $table->foreign('resposta_id_5')->references('id')->on('respostas');

            $table->bigInteger('alternativaMarcada')->nullable()->default(null);
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
        Schema::dropIfExists('prova_questaos');
    }
}
