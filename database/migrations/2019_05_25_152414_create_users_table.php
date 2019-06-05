<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

      public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('primeiroNome');
            $table->string('ultimoNome');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('foto');

            $table->bigInteger('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->bigInteger('funcao_id')->unsigned();
            $table->foreign('funcao_id')->references('id')->on('funcoes');
            $table->bigInteger('agencia_id')->unsigned();
            $table->foreign('agencia_id')->references('id')->on('agencias');

            $table->date('dataNascimento');
            $table->string('matricula', 8);
            $table->date('dataAdmissao');

            $table->string('endereco');
            $table->integer('numero');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('CEP', 10);
            $table->bigInteger('municipio_id')->unsigned();
            $table->foreign('municipio_id')->references('id')->on('municipios');

            $table->string('telefone', 13);
            $table->string('celular', 14);
            $table->boolean('ativo')->nullable()->default(false);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

