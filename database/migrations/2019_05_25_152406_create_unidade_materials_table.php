<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadeMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade_materiais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('unidade_id')->unsigned()->nullable()->default(null);
            $table->foreign('unidade_id')->references('id')->on('unidades')->onDelete('cascade');
            $table->bigInteger('material_id')->unsigned();
            $table->foreign('material_id')->references('id')->on('tipo_materiais');
            $table->string('descricao');
            $table->string('urlArquivo');
            $table->boolean('storage')->default('0');
            $table->integer('ordem')->default(1);
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
        Schema::dropIfExists('unidade_materiais');
    }
}
