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
            'icone' => 'fa fa-file-pdf-o']);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'video',
            'icone' => 'fa fa-file-movie-o']);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'link',
            'icone' => 'fa fa-external-link']);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'imagem',
            'icone' => 'fa fa-file-image-o']);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'doc',
            'icone' => 'fa fa-file-word-o']);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'xls',
            'icone' => 'fa fa-file-excel-o']);
        DB::table('tipo_materiais')->insert([
            'descricao' => 'ppt',
            'icone' => 'fa fa-file-powerpoint-o']);
    }
}
