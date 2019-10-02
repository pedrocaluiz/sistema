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
        DB::table('questoes')->insert([
            'id' => 11,
            'unidade_id' => 2,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 42,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 12,
            'unidade_id' => 2,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 45,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 13,
            'unidade_id' => 2,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 52,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 14,
            'unidade_id' => 2,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 56,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 15,
            'unidade_id' => 2,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 60,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 16,
            'unidade_id' => 2,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 62,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 17,
            'unidade_id' => 2,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 67,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 18,
            'unidade_id' => 2,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 72,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 19,
            'unidade_id' => 2,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 76,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 20,
            'unidade_id' => 2,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 78,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 21,
            'unidade_id' => 3,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 82,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 22,
            'unidade_id' => 3,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 85,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 23,
            'unidade_id' => 3,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 92,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 24,
            'unidade_id' => 3,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 96,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 25,
            'unidade_id' => 3,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 100,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 26,
            'unidade_id' => 3,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 102,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 27,
            'unidade_id' => 3,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 107,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 28,
            'unidade_id' => 3,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 112,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 29,
            'unidade_id' => 3,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 116,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 30,
            'unidade_id' => 3,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 118,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 31,
            'unidade_id' => 5,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 122,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 32,
            'unidade_id' => 5,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 125,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 33,
            'unidade_id' => 5,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 132,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 34,
            'unidade_id' => 5,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 136,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 35,
            'unidade_id' => 5,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 140,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 36,
            'unidade_id' => 5,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 142,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 37,
            'unidade_id' => 5,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 147,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 38,
            'unidade_id' => 5,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 152,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 39,
            'unidade_id' => 5,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 156,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 40,
            'unidade_id' => 5,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 158,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 41,
            'unidade_id' => 6,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 162,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 42,
            'unidade_id' => 6,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 165,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 43,
            'unidade_id' => 6,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 172,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 44,
            'unidade_id' => 6,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 176,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 45,
            'unidade_id' => 6,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 180,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 46,
            'unidade_id' => 6,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 182,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 47,
            'unidade_id' => 6,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 187,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 48,
            'unidade_id' => 6,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 192,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 49,
            'unidade_id' => 6,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 196,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 50,
            'unidade_id' => 6,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 198,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 51,
            'unidade_id' => 10,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 202,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 52,
            'unidade_id' => 10,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 205,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 53,
            'unidade_id' => 10,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 212,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 54,
            'unidade_id' => 10,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 216,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 55,
            'unidade_id' => 10,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 220,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 56,
            'unidade_id' => 10,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 222,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 57,
            'unidade_id' => 10,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 227,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 58,
            'unidade_id' => 10,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 232,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 59,
            'unidade_id' => 10,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 236,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 60,
            'unidade_id' => 10,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 238,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 61,
            'unidade_id' => 12,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 242,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 62,
            'unidade_id' => 12,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 245,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 63,
            'unidade_id' => 12,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 252,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 64,
            'unidade_id' => 12,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 256,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 65,
            'unidade_id' => 12,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 260,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 66,
            'unidade_id' => 12,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 262,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 67,
            'unidade_id' => 12,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 267,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 68,
            'unidade_id' => 12,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 272,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 69,
            'unidade_id' => 12,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 276,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 70,
            'unidade_id' => 12,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 278,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 71,
            'unidade_id' => 15,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 282,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 72,
            'unidade_id' => 15,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 285,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 73,
            'unidade_id' => 15,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 292,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 74,
            'unidade_id' => 15,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 296,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 75,
            'unidade_id' => 15,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 300,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 76,
            'unidade_id' => 15,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 302,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 77,
            'unidade_id' => 15,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 307,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 78,
            'unidade_id' => 15,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 312,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 79,
            'unidade_id' => 15,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 316,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 80,
            'unidade_id' => 15,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 318,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 81,
            'unidade_id' => 17,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 322,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 82,
            'unidade_id' => 17,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 325,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 83,
            'unidade_id' => 17,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 332,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 84,
            'unidade_id' => 17,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 336,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 85,
            'unidade_id' => 17,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 340,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 86,
            'unidade_id' => 17,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 342,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 87,
            'unidade_id' => 17,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 347,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 88,
            'unidade_id' => 17,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 352,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 89,
            'unidade_id' => 17,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 356,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 90,
            'unidade_id' => 17,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 358,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 91,
            'unidade_id' => 20,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 362,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 92,
            'unidade_id' => 20,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 365,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 93,
            'unidade_id' => 20,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 372,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 94,
            'unidade_id' => 20,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 376,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 95,
            'unidade_id' => 20,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 380,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 96,
            'unidade_id' => 20,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 382,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 97,
            'unidade_id' => 20,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 387,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 98,
            'unidade_id' => 20,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 392,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 99,
            'unidade_id' => 20,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 396,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 100,
            'unidade_id' => 20,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 398,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 101,
            'unidade_id' => 23,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 402,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 102,
            'unidade_id' => 23,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 405,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 103,
            'unidade_id' => 23,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 412,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 104,
            'unidade_id' => 23,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 416,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 105,
            'unidade_id' => 23,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 420,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 106,
            'unidade_id' => 23,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 422,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 107,
            'unidade_id' => 23,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 427,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 108,
            'unidade_id' => 23,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 432,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 109,
            'unidade_id' => 23,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 436,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 110,
            'unidade_id' => 23,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 438,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 111,
            'unidade_id' => 24,
            'questao' => 'Em relação às funções do TCP ou UDP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 442,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 112,
            'unidade_id' => 24,
            'questao' => 'Sobre os benefícios ou utilização das Máquinas Virtuais, assinale a alternativa incorreta.',
            'imagem' => null,
            'respCorreta_id' => 445,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 113,
            'unidade_id' => 24,
            'questao' => 'Qual o tempo total de download de um arquivo de 100 MBytes em um link de 1 Mbits/s?',
            'imagem' => null,
            'respCorreta_id' => 452,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 114,
            'unidade_id' => 24,
            'questao' => 'Sobre endereçamento IP, assinale a alternativa correta.',
            'imagem' => null,
            'respCorreta_id' => 456,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 115,
            'unidade_id' => 24,
            'questao' => 'A linguagem PHP conta com vários frameworks que facilitam o trabalho do desenvolvimento de aplicações Web. É correto afirmar que.',
            'imagem' => null,
            'respCorreta_id' => 460,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 116,
            'unidade_id' => 24,
            'questao' => 'A respeito do desenvolvimento de aplicações Web utilizando frameworks PHP, sabemos que.',
            'imagem' => null,
            'respCorreta_id' => 462,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 117,
            'unidade_id' => 24,
            'questao' => 'Quando utilizamos o framework Laravel para desenvolvimento com PHP,',
            'imagem' => null,
            'respCorreta_id' => 467,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 118,
            'unidade_id' => 24,
            'questao' => 'A jQuery oferece uma série de seletores especiais, que complementam os seletores da CSS. Entre eles, o seletor que permite selecionar os elementos que contém um determinado texto é',
            'imagem' => null,
            'respCorreta_id' => 472,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 119,
            'unidade_id' => 24,
            'questao' => 'Que método jQuery é usado para adicionar/remover uma ou mais classes de um elemento selecionado?',
            'imagem' => null,
            'respCorreta_id' => 476,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('questoes')->insert([
            'id' => 120,
            'unidade_id' => 24,
            'questao' => 'Que método jQuery retorna os pais (ancestrais diretos) dos elementos selecionados?',
            'imagem' => null,
            'respCorreta_id' => 478,
            'ativo' => 1,
            'usuarioAtualizacao' => 2,
        ]);
    }
}
