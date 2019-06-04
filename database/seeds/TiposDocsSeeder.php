<?php

use Illuminate\Database\Seeder;

class TiposDocsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documentos')->insert([
            'descricao' => 'Registro Geral', 
            'siglaDocumento' => 'RG',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_documentos')->insert([
            'descricao' => 'Carteira Nacional de Habilitação', 
            'siglaDocumento' => 'CNH',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_documentos')->insert([
            'descricao' => 'Conselho Regional de Psicologia', 
            'siglaDocumento' => 'CRP',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_documentos')->insert([
            'descricao' => 'Certidão de Nascimento', 
            'siglaDocumento' => 'CN',
            'usuarioAtualizacao' => 1]);
        DB::table('tipo_documentos')->insert([
            'descricao' => 'Certidão de Casamento', 
            'siglaDocumento' => 'CC',
            'usuarioAtualizacao' => 1]);
    }
}
