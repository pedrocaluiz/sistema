<?php

use Illuminate\Database\Seeder;

class TipoMatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_materiais')->insert([
            'descricao' => 'pdf', 
            'icone' => 'glyphicon glyphicon-paperclip',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'video', 
            'icone' => 'glyphicon glyphicon-play',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'link', 
            'icone' => 'glyphicon glyphicon-share',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'imagem', 
            'icone' => 'glyphicon glyphicon-picture',
            'usuarioAtualizacao' => 1]);
    }
}
