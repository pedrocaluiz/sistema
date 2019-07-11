<?php

use Illuminate\Database\Seeder;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades')->insert([
            'titulo' => 'Designer de Aplicações WEB',
            'curso_id' => '1',
            'ordem' => '1',
            'usuarioAtualizacao' => 1]);

        DB::table('unidades')->insert([
            'titulo' => 'Programador de Aplicações WEB',
            'curso_id' => '2',
            'ordem' => '3',
            'usuarioAtualizacao' => 2]);

        DB::table('unidades')->insert([
            'titulo' => 'Analista de Aplicações WEB',
            'curso_id' => '3',
            'ordem' => '2',
            'usuarioAtualizacao' => 2]);
    }
}
