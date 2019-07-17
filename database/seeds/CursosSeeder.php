<?php

use Illuminate\Database\Seeder;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            'categoria_id' => '1',
            'titulo' => 'Designer de Aplicações WEB',
            'descricao' => 'Designer de Aplicações WEB e mais alguns dizeres ...',
            'icone' => 'glyphicon glyphicon-film',
            'palavrasChave' => 'Designer; Aplicações; WEB; maisAlgumaCoisa;',
            'ativo' => '1',
            'usuarioAtualizacao' => 1]);

        DB::table('cursos')->insert([
            'categoria_id' => '2',
            'titulo' => 'Programador de Aplicações WEB',
            'descricao' => 'Programador de Aplicações WEB e mais alguns dizeres ...',
            'icone' => 'glyphicon glyphicon-signal',
            'palavrasChave' => 'Programador; Aplicações; WEB; maisAlgumaCoisa;',
            'ativo' => '0',
            'usuarioAtualizacao' => 2]);

        DB::table('cursos')->insert([
            'categoria_id' => '3',
            'titulo' => 'Analista de Aplicações WEB',
            'descricao' => 'Analista de Aplicações WEB e mais alguns dizeres ...',
            'icone' => 'glyphicon glyphicon-headphones',
            'palavrasChave' => 'Analista; Aplicações; WEB; maisAlgumaCoisa;',
            'usuarioAtualizacao' => 1]);
    }
}
