<?php

use Illuminate\Database\Seeder;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert([
            'descricao' => 'TÉCNICO BANCÁRIO - NOVO',
            'salarioBase' => '3635',
            'usuarioAtualizacao' => 1]);
        DB::table('cargos')->insert([
            'descricao' => 'ADVOGADO',
            'salarioBase' => '5000',
            'usuarioAtualizacao' => 1]);
        DB::table('cargos')->insert([
            'descricao' => 'ENGENHEIRO',
            'salarioBase' => '8000',
            'usuarioAtualizacao' => 1]);
        DB::table('cargos')->insert([
            'descricao' => 'ARQUITETO',
            'salarioBase' => '4000',
            'usuarioAtualizacao' => 1]);
        DB::table('cargos')->insert([
            'descricao' => 'MÉDICO DO TRABALHO',
            'salarioBase' => '12000',
            'usuarioAtualizacao' => 1]);
    }
}
