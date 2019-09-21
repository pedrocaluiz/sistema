<?php

use Illuminate\Database\Seeder;

class RespostasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('respostas')->insert([
            'id' => 1,
            'questao_id' => 1,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 2,
			'questao_id' => 1,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 3,
			'questao_id' => 1,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 4,
			'questao_id' => 1,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);


        DB::table('respostas')->insert([
            'id' => 5,
			'questao_id' => 2,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 6,
			'questao_id' => 2,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 7,
			'questao_id' => 2,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 8,
			'questao_id' => 2,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);


        DB::table('respostas')->insert([
            'id' => 9,
			'questao_id' => 3,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 10,
			'questao_id' => 3,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 11,
			'questao_id' => 3,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 12,
			'questao_id' => 3,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);


        DB::table('respostas')->insert([
            'id' => 13,
			'questao_id' => 4,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 14,
			'questao_id' => 4,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 15,
			'questao_id' => 4,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 16,
			'questao_id' => 4,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);


        DB::table('respostas')->insert([
            'id' => 17,
            'questao_id' => 5,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 18,
			'questao_id' => 5,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 19,
			'questao_id' => 5,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 20,
			'questao_id' => 5,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);


        DB::table('respostas')->insert([
            'id' => 21,
            'questao_id' => 6,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 22,
			'questao_id' => 6,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 23,
			'questao_id' => 6,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 24,
			'questao_id' => 6,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);


        DB::table('respostas')->insert([
            'id' => 25,
            'questao_id' => 7,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 26,
			'questao_id' => 7,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 27,
			'questao_id' => 7,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 28,
			'questao_id' => 7,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);

        DB::table('respostas')->insert([
            'id' => 29,
            'questao_id' => 8,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 30,
			'questao_id' => 8,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 31,
			'questao_id' => 8,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 32,
			'questao_id' => 8,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);


        DB::table('respostas')->insert([
            'id' => 33,
            'questao_id' => 9,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 34,
			'questao_id' => 9,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 35,
			'questao_id' => 9,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 36,
			'questao_id' => 9,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);


        DB::table('respostas')->insert([
            'id' => 37,
            'questao_id' => 10,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 38,
			'questao_id' => 10,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 39,
			'questao_id' => 10,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 40,
			'questao_id' => 10,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
    }
}
