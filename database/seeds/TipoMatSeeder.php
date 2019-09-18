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
            'icone' => 'fa fa-file-pdf-o',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'video',
            'icone' => 'fa fa-file-movie-o',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'link',
            'icone' => 'fa fa-external-link',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'imagem',
            'icone' => 'fa fa-file-image-o',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'doc',
            'icone' => 'fa fa-file-word-o',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'xls',
            'icone' => 'fa fa-file-excel-o',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'ppt',
            'icone' => 'fa fa-file-powerpoint-o',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'audio',
            'icone' => 'fa fa-file-audio-o',
            'usuarioAtualizacao' => 1]);
    }
}
