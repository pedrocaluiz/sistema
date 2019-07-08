<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->decimal('valorFuncao', 10, 2);
            $table->decimal('pisoSalarial', 10, 2);
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
        Schema::dropIfExists('funcoes');
    }
}
