<?php

use Illuminate\Database\Seeder;

class FuncoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funcoes')->insert([
            'descricao' => 'CAIXA', 
            'valorFuncao' => '1816,00', 
            'pisoSalarial' => '5054,00',
            'usuarioAtualizacao' => 1]);

        DB::table('funcoes')->insert([
            'descricao' => 'ASSISTENTE DE ATENDIMENTO E NEGÓCIOS', 
            'valorFuncao' => '1952,00',
            'pisoSalarial' => '5823,00',
            'usuarioAtualizacao' => 1]);

        DB::table('funcoes')->insert([
            'descricao' => 'GERENTE DE CANAIS E NEGÓCIOS', 
            'valorFuncao' => '3950,00', 
            'pisoSalarial' => '9101,00',
            'usuarioAtualizacao' => 1]);

        DB::table('funcoes')->insert([
            'descricao' => 'JUNIOR', 
            'valorFuncao' => '2000,00', 
            'pisoSalarial' => '5000,00',
            'usuarioAtualizacao' => 1]);

        DB::table('funcoes')->insert([
            'descricao' => 'PLENO', 
            'valorFuncao' => '3000,00', 
            'pisoSalarial' => '6000,00',
            'usuarioAtualizacao' => 1]);

        DB::table('funcoes')->insert([
            'descricao' => 'SÊNIOR', 
            'valorFuncao' => '4000,00', 
            'pisoSalarial' => '9000,00',
            'usuarioAtualizacao' => 1]);

    }
}
