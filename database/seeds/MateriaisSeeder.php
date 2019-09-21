<?php

use Illuminate\Database\Seeder;

class MateriaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidade_materiais')->insert([
            'id' => 1,
            'unidade_id' => 1,
            'material_id' => 2,
            'descricao' => 'API RESTful',
            'urlArquivo' => 'material/0Oa4opzrnDqjEXL6uq8Awtkn8tdKLVBJbSuqdawH.mp4',
            'storage' => 1,
            'ordem' => 2,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 2,
            'unidade_id' => 1,
            'material_id' => 2,
            'descricao' => 'Projeto da Arquitetura da Informação',
            'urlArquivo' => 'material/hCQ5bt6lj3qPWthxEQD2gaxLRYwMOckJQ7c1yv9I.mp4',
            'storage' => 1,
            'ordem' => 4,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 3,
            'unidade_id' => 1,
            'material_id' => 2,
            'descricao' => 'CSS Truques',
            'urlArquivo' => 'https://www.youtube.com/embed/bjUoQbSJDJs',
            'storage' => 0,
            'ordem' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 4,
            'unidade_id' => 1,
            'material_id' => 2,
            'descricao' => 'Laravel Framework',
            'urlArquivo' => 'https://www.youtube.com/embed/ImtZ5yENzgE',
            'storage' => 0,
            'ordem' => 3,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 5,
            'unidade_id' => 1,
            'material_id' => 1,
            'descricao' => 'Orientação TCC',
            'urlArquivo' => 'material/iFr09mLzCfflJ7iVMoOXtsSYB5lJpYywlWh49ny5.pdf',
            'storage' => 1,
            'ordem' => 5,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 6,
            'unidade_id' => 1,
            'material_id' => 1,
            'descricao' => 'Proposta  Sistema de Treinamentos',
            'urlArquivo' => 'material/Xwjp0jtH5Bbp3tlQBIVRk9LYlWwZVN5CVuSFXXhG.pdf',
            'storage' => 1,
            'ordem' => 6,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 7,
            'unidade_id' => 1,
            'material_id' => 5,
            'descricao' => 'Modelo Projeto Aplicativo',
            'urlArquivo' => 'material/Jy5KzoyyOLGGTKOiUe5ASHqAaGY0S0r9stmi6Bx4.doc',
            'storage' => 1,
            'ordem' => 7,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 8,
            'unidade_id' => 1,
            'material_id' => 6,
            'descricao' => 'Cálculo APT',
            'urlArquivo' => 'material/w2wskGrVwGxpQKeHxcUhvFUGqyLIwSLMNkGgJ835.xls',
            'storage' => 1,
            'ordem' => 8,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 9,
            'unidade_id' => 1,
            'material_id' => 4,
            'descricao' => 'Padrão MVC',
            'urlArquivo' => 'material/rqgd1py13faljalaur2iwl3GlQYfCA4OIXmyK6Dz.png',
            'storage' => 1,
            'ordem' => 9,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 10,
            'unidade_id' => 1,
            'material_id' => 4,
            'descricao' => 'HTML, CSS, JavaScript',
            'urlArquivo' => 'material/Q5o38WOIXvEs9E9ahrsGRtTXywNHhZRqYFXIMZa9.jpeg',
            'storage' => 1,
            'ordem' => 10,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 11,
            'unidade_id' => 1,
            'material_id' => 1,
            'descricao' => 'Web Referências',
            'urlArquivo' => 'https://ava.virtual.pucminas.br/pluginfile.php/468330/mod_resource/content/1/WEB - 00.1 - Referências e Ferramentas.pdf',
            'storage' => 0,
            'ordem' => 11,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 12,
            'unidade_id' => 1,
            'material_id' => 4,
            'descricao' => 'Laravel-banner',
            'urlArquivo' => 'https://www.bleap.in/wp-content/uploads/2019/07/Laravel-banner.jpg',
            'storage' => 0,
            'ordem' => 12,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 13,
            'unidade_id' => 1,
            'material_id' => 3,
            'descricao' => 'HTML5 Tutorial',
            'urlArquivo' => 'https://www.w3schools.com/html/default.asp',
            'storage' => 0,
            'ordem' => 13,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidade_materiais')->insert([
            'id' => 14,
            'unidade_id' => 1,
            'material_id' => 3,
            'descricao' => 'MDN web docs',
            'urlArquivo' => 'https://developer.mozilla.org/pt-BR/',
            'storage' => 0,
            'ordem' => 14,
            'usuarioAtualizacao' => 2,
        ]);
    }
}
