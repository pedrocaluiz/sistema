<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_unidades', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->bigInteger('unidade_id')->unsigned();
            $table->foreign('unidade_id')->references('id')->on('unidades');
            $table->bigInteger('usuarioAtualizacao');
            
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
        Schema::dropIfExists('curso_unidades');
    }
}
