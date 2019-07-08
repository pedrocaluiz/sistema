<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codigoUnidade');
            $table->string('descricao');
            $table->integer('SR');
            $table->integer('DIRE');
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
        Schema::dropIfExists('agencias');
    }
}
