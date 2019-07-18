<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id')->on('unidades')->onDelete('cascade');
            $table->longText('questao');
            $table->string('imagem')->nullable()->default(null);;

            $table->bigInteger('respCorreta_id')->unsigned()->nullable()->default(null);
            $table->foreign('respCorreta_id')->references('id')->on('respostas');

            $table->boolean('ativo')->nullable()->default(true);
            $table->integer('usuarioAtualizacao');
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
        Schema::dropIfExists('questoes');
    }
}
