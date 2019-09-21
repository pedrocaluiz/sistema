<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categorias')->insert([
            'descricao' => 'Rede de Computadores',
            'icone' => 'glyphicon glyphicon-signal',
            'usuarioAtualizacao' => 1]);
        DB::table('categorias')->insert([
            'descricao' => 'Música',
            'icone' => 'glyphicon glyphicon-headphones',
            'usuarioAtualizacao' => 1]);
        DB::table('categorias')->insert([
            'descricao' => 'Designer',
            'icone' => 'glyphicon glyphicon-film',
            'usuarioAtualizacao' => 1]);
        DB::table('categorias')->insert([
            'descricao' => 'Tecnologia da Informação',
            'icone' => 'fa fa-windows',
            'usuarioAtualizacao' => 1]);
        DB::table('categorias')->insert([
            'descricao' => 'Aplicações Web',
            'icone' => 'fa fa-internet-explorer',
            'usuarioAtualizacao' => 1]);
    }
}
