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
            'curso_id' => 1,
            'titulo' => 'Infraestrutura de Redes de Computadores',
            'ordem' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 1,
            'titulo' => 'Servidor web Linux/Apache',
            'ordem' => 2,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 1,
            'titulo' => 'Segurança de Servidores Web',
            'ordem' => 3,
            'usuarioAtualizacao' => 2,
        ]);







        DB::table('unidades')->insert([
            'curso_id' => 2,
            'titulo' => 'Introdução',
            'ordem' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 2,
            'titulo' => 'Otimização de Sites para Buscas',
            'ordem' => 2,
            'usuarioAtualizacao' => 2,
        ]);






        DB::table('unidades')->insert([
            'curso_id' => 3,
            'titulo' => 'Análise e métricas',
            'ordem' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 3,
            'titulo' => 'Conteúdo e otimização',
            'ordem' => 2,
            'usuarioAtualizacao' => 2,
        ]);







        DB::table('unidades')->insert([
            'curso_id' => 4,
            'titulo' => 'Conceitos de Gerência de Configuração',
            'ordem' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 4,
            'titulo' => 'Processo de Gerência de Configuração',
            'ordem' => 2,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 4,
            'titulo' => 'Gerência de Configuração no MPS.Br',
            'ordem' => 3,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 4,
            'titulo' => 'Ferramentas de Gerência de Configuração',
            'ordem' => 4,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 4,
            'titulo' => 'Atividade Prática',
            'ordem' => 5,
            'usuarioAtualizacao' => 2,
        ]);













        DB::table('unidades')->insert([
            'curso_id' => 5,
            'titulo' => 'Introdução aos Testes de Software',
            'ordem' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 5,
            'titulo' => 'Níveis e Tipos de Testes de Software',
            'ordem' => 2,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 5,
            'titulo' => 'Processo de Testes de Software',
            'ordem' => 3,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 5,
            'titulo' => 'Casos de Testes de Software',
            'ordem' => 4,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 5,
            'titulo' => 'Atividade Prática',
            'ordem' => 5,
            'usuarioAtualizacao' => 2,
        ]);







        DB::table('unidades')->insert([
            'curso_id' => 6,
            'titulo' => 'Arquitetura da Web',
            'ordem' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 6,
            'titulo' => 'JavaScript',
            'ordem' => 2,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 6,
            'titulo' => 'Bibliotecas',
            'ordem' => 3,
            'usuarioAtualizacao' => 2,
        ]);







        DB::table('unidades')->insert([
            'curso_id' => 7,
            'titulo' => 'Introdução ao PHP',
            'ordem' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 7,
            'titulo' => 'Construção de aplicações Web com PHP',
            'ordem' => 2,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('unidades')->insert([
            'curso_id' => 7,
            'titulo' => 'Frameworks back-end',
            'ordem' => 3,
            'usuarioAtualizacao' => 2,
        ]);








        DB::table('unidades')->insert([
            'curso_id' => 8,
            'titulo' => 'APIs de dados da HTML5',
            'ordem' => 1,
            'usuarioAtualizacao' => 2,
        ]);



    }
}
