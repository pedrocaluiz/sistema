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
            'categoria_id' => 1,
            'titulo' => 'Servidores Web',
            'descricao' => 'Servidores Web, na categoria Rede de Computadores.',
            'icone' => 'glyphicon glyphicon-signal',
            'palavrasChave' => 'Rede de Computadores; Infraestrutura de Redes de Computadores; Servidor web Linux/Apache; Segurança de Servidores Web;',
            'ativo' => 1,
            'usuarioAtualizacao' => 1,
        ]);
        DB::table('cursos')->insert([
            'categoria_id' => 5,
            'titulo' => 'Análise e Otimização de Acessos I',
            'descricao' => 'Análise e Otimização de Acessos I, na categoria Aplicações Web',
            'icone' => 'fa fa-internet-explorer',
            'palavrasChave' => 'Aplicações Web; Introdução; Otimização de Sites para Buscas;',
            'ativo' => 1,
            'usuarioAtualizacao' => 1,
        ]);
        DB::table('cursos')->insert([
            'categoria_id' => 5,
            'titulo' => 'Análise e Otimização de Acessos II',
            'descricao' => 'Análise e Otimização de Acessos II, na categoria Aplicações Web',
            'icone' => 'fa fa-internet-explorer',
            'palavrasChave' => 'Aplicações Web; Análise e métricas;',
            'ativo' => 1,
            'usuarioAtualizacao' => 1,
        ]);
        DB::table('cursos')->insert([
            'categoria_id' => 5,
            'titulo' => 'Gerência de Configuração',
            'descricao' => 'Gerência de Configuração, na categoria Aplicações Web',
            'icone' => 'fa fa-internet-explorer',
            'palavrasChave' => 'Aplicações Web; Conceitos de Gerência de Configuração; Processo de Gerência de Configuração; Gerência de Configuração no MPS.Br; Ferramentas de Gerência de Configuração; Atividade Prática;',
            'ativo' => 1,
            'usuarioAtualizacao' => 1,
        ]);
        DB::table('cursos')->insert([
            'categoria_id' => 5,
            'titulo' => 'Fundamentos de Testes de Software',
            'descricao' => 'Fundamentos de Testes de Software, na categoria Aplicações Web',
            'icone' => 'fa fa-internet-explorer',
            'palavrasChave' => 'Aplicações Web; Introdução aos Testes de Software; Níveis e Tipos de Testes de Software; Processo de Testes de Software; Casos de Testes de Software; Atividade Prática;',
            'ativo' => 1,
            'usuarioAtualizacao' => 1,
        ]);
        DB::table('cursos')->insert([
            'categoria_id' => 4,
            'titulo' => 'Padrões Web',
            'descricao' => 'Padrões Web, na categoria Tecnologia da Informação',
            'icone' => 'fa fa-windows',
            'palavrasChave' => 'Tecnologia da Informação; Arquitetura da Web; JavaScript; Bibliotecas;',
            'ativo' => 1,
            'usuarioAtualizacao' => 1,
        ]);
        DB::table('cursos')->insert([
            'categoria_id' => 4,
            'titulo' => 'Aplicações Web',
            'descricao' => 'Aplicações Web, na categoria Tecnologia da Informação',
            'icone' => 'fa fa-windows',
            'palavrasChave' => 'Tecnologia da Informação; Introdução ao PHP; Construção de aplicações Web com PHP; Frameworks back-end;',
            'ativo' => 1,
            'usuarioAtualizacao' => 1,
        ]);
        DB::table('cursos')->insert([
            'categoria_id' => 4,
            'titulo' => 'Front-end',
            'descricao' => 'Front-end, na categoria Tecnologia da Informação',
            'icone' => 'fa fa-windows',
            'palavrasChave' => 'Tecnologia da Informação; APIs de dados da HTML5;',
            'ativo' => 1,
            'usuarioAtualizacao' => 1,
        ]);
    }
}
