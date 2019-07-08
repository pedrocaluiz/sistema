<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tipoDoc_id')->unsigned();
            $table->foreign('tipoDoc_id')->references('id')->on('tipo_documentos');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('estadoEmissor_id')->unsigned();
            $table->foreign('estadoEmissor_id')->references('id')->on('estados');
            $table->string('numeroDocumento');
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
        Schema::dropIfExists('documentos');
    }
}
