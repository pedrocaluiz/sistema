<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioCursoUnidadeMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_curso_unidade_material_prova', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('curso_id')->unsigned()->nullable()->default(null);
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->bigInteger('unidade_id')->unsigned()->nullable()->default(null);
            $table->foreign('unidade_id')->references('id')->on('unidades');
            $table->bigInteger('material_id')->unsigned()->nullable()->default(null);
            $table->foreign('material_id')->references('id')->on('unidade_materiais');
            $table->bigInteger('prova_id')->unsigned()->nullable()->default(null);
            $table->foreign('prova_id')->references('id')->on('provas');
            $table->decimal('notaAval', '5', '2')->nullable()->default(null);
            $table->date('dataConclusao')->nullable()->default(null);
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
        Schema::dropIfExists('usuario_curso_unidade_materials');
    }
}
