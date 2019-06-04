<?php

use Illuminate\Database\Seeder;

class PerfisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfis')->insert([
            'descricao' => 'Administrador', 
            'administrador' => true,
            'ativo' => true,
            'usuarioAtualizacao' => 1]);
        DB::table('perfis')->insert([
            'descricao' => 'Instrutor', 
            'administrador' => false,
            'ativo' => true,
            'usuarioAtualizacao' => 1]);
        DB::table('perfis')->insert([
            'descricao' => 'Aluno', 
            'administrador' => false,
            'ativo' => true,
            'usuarioAtualizacao' => 1]);
    }
}
