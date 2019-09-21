<?php

use Illuminate\Database\Seeder;

class QuestoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questoes')->insert([
            'id' => 1,
            'unidade_id' => 1,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
			'respCorreta_id' => 2,
			'ativo' => 1,
			'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 2,
			'unidade_id' => 1,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
			'respCorreta_id' => 5,
			'ativo' => 1,
			'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 3,
			'unidade_id' => 1,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
			'respCorreta_id' => 12,
			'ativo' => 1,
			'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 4,
			'unidade_id' => 1,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
			'respCorreta_id' => 16,
			'ativo' => 1,
			'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 5,
            'unidade_id' => 1,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
			'respCorreta_id' => 20,
			'ativo' => 1,
			'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 6,
			'unidade_id' => 1,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
			'respCorreta_id' => 22,
			'ativo' => 1,
			'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 7,
			'unidade_id' => 1,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
			'respCorreta_id' => 27,
			'ativo' => 1,
			'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 8,
            'unidade_id' => 1,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
			'respCorreta_id' => 32,
			'ativo' => 1,
			'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 9,
			'unidade_id' => 1,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
			'respCorreta_id' => 36,
			'ativo' => 1,
			'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 10,
			'unidade_id' => 1,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
			'respCorreta_id' => 38,
			'ativo' => 1,
			'usuarioAtualizacao' => 2,
        ]);
    }
}
