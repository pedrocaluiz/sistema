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
        DB::table('respostas')->insert([
            'id' => 41,
            'questao_id' => 11,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 42,
            'questao_id' => 11,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 43,
            'questao_id' => 11,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 44,
            'questao_id' => 11,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 45,
            'questao_id' => 12,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 46,
            'questao_id' => 12,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 47,
            'questao_id' => 12,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 48,
            'questao_id' => 12,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 49,
            'questao_id' => 13,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 50,
            'questao_id' => 13,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 51,
            'questao_id' => 13,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 52,
            'questao_id' => 13,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 53,
            'questao_id' => 14,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 54,
            'questao_id' => 14,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 55,
            'questao_id' => 14,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 56,
            'questao_id' => 14,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 57,
            'questao_id' => 15,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 58,
            'questao_id' => 15,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 59,
            'questao_id' => 15,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 60,
            'questao_id' => 15,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 61,
            'questao_id' => 16,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 62,
            'questao_id' => 16,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 63,
            'questao_id' => 16,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 64,
            'questao_id' => 16,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 65,
            'questao_id' => 17,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 66,
            'questao_id' => 17,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 67,
            'questao_id' => 17,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 68,
            'questao_id' => 17,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 69,
            'questao_id' => 18,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 70,
            'questao_id' => 18,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 71,
            'questao_id' => 18,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 72,
            'questao_id' => 18,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 73,
            'questao_id' => 19,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 74,
            'questao_id' => 19,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 75,
            'questao_id' => 19,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 76,
            'questao_id' => 19,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 77,
            'questao_id' => 20,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 78,
            'questao_id' => 20,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 79,
            'questao_id' => 20,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 80,
            'questao_id' => 20,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 81,
            'questao_id' => 21,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 82,
            'questao_id' => 21,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 83,
            'questao_id' => 21,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 84,
            'questao_id' => 21,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 85,
            'questao_id' => 22,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 86,
            'questao_id' => 22,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 87,
            'questao_id' => 22,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 88,
            'questao_id' => 22,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 89,
            'questao_id' => 23,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 90,
            'questao_id' => 23,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 91,
            'questao_id' => 23,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 92,
            'questao_id' => 23,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 93,
            'questao_id' => 24,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 94,
            'questao_id' => 24,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 95,
            'questao_id' => 24,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 96,
            'questao_id' => 24,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 97,
            'questao_id' => 25,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 98,
            'questao_id' => 25,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 99,
            'questao_id' => 25,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 100,
            'questao_id' => 25,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 101,
            'questao_id' => 26,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 102,
            'questao_id' => 26,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 103,
            'questao_id' => 26,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 104,
            'questao_id' => 26,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 105,
            'questao_id' => 27,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 106,
            'questao_id' => 27,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 107,
            'questao_id' => 27,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 108,
            'questao_id' => 27,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 109,
            'questao_id' => 28,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 110,
            'questao_id' => 28,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 111,
            'questao_id' => 28,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 112,
            'questao_id' => 28,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 113,
            'questao_id' => 29,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 114,
            'questao_id' => 29,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 115,
            'questao_id' => 29,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 116,
            'questao_id' => 29,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 117,
            'questao_id' => 30,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 118,
            'questao_id' => 30,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 119,
            'questao_id' => 30,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 120,
            'questao_id' => 30,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 121,
            'questao_id' => 31,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 122,
            'questao_id' => 31,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 123,
            'questao_id' => 31,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 124,
            'questao_id' => 31,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 125,
            'questao_id' => 32,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 126,
            'questao_id' => 32,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 127,
            'questao_id' => 32,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 128,
            'questao_id' => 32,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 129,
            'questao_id' => 33,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 130,
            'questao_id' => 33,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 131,
            'questao_id' => 33,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 132,
            'questao_id' => 33,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 133,
            'questao_id' => 34,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 134,
            'questao_id' => 34,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 135,
            'questao_id' => 34,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 136,
            'questao_id' => 34,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 137,
            'questao_id' => 35,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 138,
            'questao_id' => 35,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 139,
            'questao_id' => 35,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 140,
            'questao_id' => 35,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 141,
            'questao_id' => 36,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 142,
            'questao_id' => 36,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 143,
            'questao_id' => 36,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 144,
            'questao_id' => 36,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 145,
            'questao_id' => 37,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 146,
            'questao_id' => 37,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 147,
            'questao_id' => 37,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 148,
            'questao_id' => 37,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 149,
            'questao_id' => 38,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 150,
            'questao_id' => 38,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 151,
            'questao_id' => 38,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 152,
            'questao_id' => 38,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 153,
            'questao_id' => 39,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 154,
            'questao_id' => 39,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 155,
            'questao_id' => 39,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 156,
            'questao_id' => 39,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 157,
            'questao_id' => 40,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 158,
            'questao_id' => 40,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 159,
            'questao_id' => 40,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 160,
            'questao_id' => 40,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 161,
            'questao_id' => 41,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 162,
            'questao_id' => 41,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 163,
            'questao_id' => 41,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 164,
            'questao_id' => 41,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 165,
            'questao_id' => 42,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 166,
            'questao_id' => 42,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 167,
            'questao_id' => 42,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 168,
            'questao_id' => 42,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 169,
            'questao_id' => 43,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 170,
            'questao_id' => 43,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 171,
            'questao_id' => 43,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 172,
            'questao_id' => 43,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 173,
            'questao_id' => 44,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 174,
            'questao_id' => 44,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 175,
            'questao_id' => 44,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 176,
            'questao_id' => 44,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 177,
            'questao_id' => 45,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 178,
            'questao_id' => 45,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 179,
            'questao_id' => 45,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 180,
            'questao_id' => 45,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 181,
            'questao_id' => 46,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 182,
            'questao_id' => 46,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 183,
            'questao_id' => 46,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 184,
            'questao_id' => 46,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 185,
            'questao_id' => 47,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 186,
            'questao_id' => 47,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 187,
            'questao_id' => 47,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 188,
            'questao_id' => 47,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 189,
            'questao_id' => 48,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 190,
            'questao_id' => 48,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 191,
            'questao_id' => 48,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 192,
            'questao_id' => 48,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 193,
            'questao_id' => 49,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 194,
            'questao_id' => 49,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 195,
            'questao_id' => 49,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 196,
            'questao_id' => 49,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 197,
            'questao_id' => 50,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 198,
            'questao_id' => 50,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 199,
            'questao_id' => 50,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 200,
            'questao_id' => 50,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 201,
            'questao_id' => 51,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 202,
            'questao_id' => 51,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 203,
            'questao_id' => 51,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 204,
            'questao_id' => 51,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 205,
            'questao_id' => 52,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 206,
            'questao_id' => 52,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 207,
            'questao_id' => 52,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 208,
            'questao_id' => 52,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 209,
            'questao_id' => 53,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 210,
            'questao_id' => 53,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 211,
            'questao_id' => 53,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 212,
            'questao_id' => 53,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 213,
            'questao_id' => 54,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 214,
            'questao_id' => 54,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 215,
            'questao_id' => 54,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 216,
            'questao_id' => 54,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 217,
            'questao_id' => 55,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 218,
            'questao_id' => 55,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 219,
            'questao_id' => 55,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 220,
            'questao_id' => 55,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 221,
            'questao_id' => 56,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 222,
            'questao_id' => 56,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 223,
            'questao_id' => 56,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 224,
            'questao_id' => 56,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 225,
            'questao_id' => 57,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 226,
            'questao_id' => 57,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 227,
            'questao_id' => 57,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 228,
            'questao_id' => 57,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 229,
            'questao_id' => 58,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 230,
            'questao_id' => 58,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 231,
            'questao_id' => 58,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 232,
            'questao_id' => 58,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 233,
            'questao_id' => 59,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 234,
            'questao_id' => 59,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 235,
            'questao_id' => 59,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 236,
            'questao_id' => 59,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 237,
            'questao_id' => 60,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 238,
            'questao_id' => 60,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 239,
            'questao_id' => 60,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 240,
            'questao_id' => 60,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 241,
            'questao_id' => 61,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 242,
            'questao_id' => 61,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 243,
            'questao_id' => 61,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 244,
            'questao_id' => 61,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 245,
            'questao_id' => 62,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 246,
            'questao_id' => 62,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 247,
            'questao_id' => 62,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 248,
            'questao_id' => 62,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 249,
            'questao_id' => 63,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 250,
            'questao_id' => 63,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 251,
            'questao_id' => 63,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 252,
            'questao_id' => 63,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 253,
            'questao_id' => 64,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 254,
            'questao_id' => 64,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 255,
            'questao_id' => 64,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 256,
            'questao_id' => 64,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 257,
            'questao_id' => 65,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 258,
            'questao_id' => 65,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 259,
            'questao_id' => 65,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 260,
            'questao_id' => 65,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 261,
            'questao_id' => 66,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 262,
            'questao_id' => 66,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 263,
            'questao_id' => 66,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 264,
            'questao_id' => 66,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 265,
            'questao_id' => 67,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 266,
            'questao_id' => 67,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 267,
            'questao_id' => 67,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 268,
            'questao_id' => 67,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 269,
            'questao_id' => 68,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 270,
            'questao_id' => 68,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 271,
            'questao_id' => 68,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 272,
            'questao_id' => 68,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 273,
            'questao_id' => 69,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 274,
            'questao_id' => 69,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 275,
            'questao_id' => 69,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 276,
            'questao_id' => 69,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 277,
            'questao_id' => 70,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 278,
            'questao_id' => 70,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 279,
            'questao_id' => 70,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 280,
            'questao_id' => 70,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 281,
            'questao_id' => 71,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 282,
            'questao_id' => 71,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 283,
            'questao_id' => 71,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 284,
            'questao_id' => 71,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 285,
            'questao_id' => 72,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 286,
            'questao_id' => 72,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 287,
            'questao_id' => 72,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 288,
            'questao_id' => 72,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 289,
            'questao_id' => 73,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 290,
            'questao_id' => 73,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 291,
            'questao_id' => 73,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 292,
            'questao_id' => 73,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 293,
            'questao_id' => 74,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 294,
            'questao_id' => 74,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 295,
            'questao_id' => 74,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 296,
            'questao_id' => 74,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 297,
            'questao_id' => 75,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 298,
            'questao_id' => 75,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 299,
            'questao_id' => 75,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 300,
            'questao_id' => 75,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 301,
            'questao_id' => 76,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 302,
            'questao_id' => 76,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 303,
            'questao_id' => 76,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 304,
            'questao_id' => 76,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 305,
            'questao_id' => 77,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 306,
            'questao_id' => 77,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 307,
            'questao_id' => 77,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 308,
            'questao_id' => 77,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 309,
            'questao_id' => 78,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 310,
            'questao_id' => 78,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 311,
            'questao_id' => 78,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 312,
            'questao_id' => 78,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 313,
            'questao_id' => 79,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 314,
            'questao_id' => 79,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 315,
            'questao_id' => 79,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 316,
            'questao_id' => 79,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 317,
            'questao_id' => 80,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 318,
            'questao_id' => 80,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 319,
            'questao_id' => 80,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 320,
            'questao_id' => 80,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 321,
            'questao_id' => 81,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 322,
            'questao_id' => 81,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 323,
            'questao_id' => 81,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 324,
            'questao_id' => 81,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 325,
            'questao_id' => 82,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 326,
            'questao_id' => 82,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 327,
            'questao_id' => 82,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 328,
            'questao_id' => 82,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 329,
            'questao_id' => 83,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 330,
            'questao_id' => 83,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 331,
            'questao_id' => 83,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 332,
            'questao_id' => 83,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 333,
            'questao_id' => 84,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 334,
            'questao_id' => 84,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 335,
            'questao_id' => 84,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 336,
            'questao_id' => 84,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 337,
            'questao_id' => 85,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 338,
            'questao_id' => 85,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 339,
            'questao_id' => 85,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 340,
            'questao_id' => 85,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 341,
            'questao_id' => 86,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 342,
            'questao_id' => 86,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 343,
            'questao_id' => 86,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 344,
            'questao_id' => 86,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 345,
            'questao_id' => 87,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 346,
            'questao_id' => 87,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 347,
            'questao_id' => 87,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 348,
            'questao_id' => 87,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 349,
            'questao_id' => 88,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 350,
            'questao_id' => 88,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 351,
            'questao_id' => 88,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 352,
            'questao_id' => 88,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 353,
            'questao_id' => 89,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 354,
            'questao_id' => 89,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 355,
            'questao_id' => 89,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 356,
            'questao_id' => 89,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 357,
            'questao_id' => 90,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 358,
            'questao_id' => 90,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 359,
            'questao_id' => 90,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 360,
            'questao_id' => 90,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 361,
            'questao_id' => 91,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 362,
            'questao_id' => 91,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 363,
            'questao_id' => 91,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 364,
            'questao_id' => 91,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 365,
            'questao_id' => 92,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 366,
            'questao_id' => 92,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 367,
            'questao_id' => 92,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 368,
            'questao_id' => 92,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 369,
            'questao_id' => 93,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 370,
            'questao_id' => 93,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 371,
            'questao_id' => 93,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 372,
            'questao_id' => 93,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 373,
            'questao_id' => 94,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 374,
            'questao_id' => 94,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 375,
            'questao_id' => 94,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 376,
            'questao_id' => 94,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 377,
            'questao_id' => 95,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 378,
            'questao_id' => 95,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 379,
            'questao_id' => 95,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 380,
            'questao_id' => 95,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 381,
            'questao_id' => 96,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 382,
            'questao_id' => 96,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 383,
            'questao_id' => 96,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 384,
            'questao_id' => 96,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 385,
            'questao_id' => 97,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 386,
            'questao_id' => 97,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 387,
            'questao_id' => 97,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 388,
            'questao_id' => 97,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 389,
            'questao_id' => 98,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 390,
            'questao_id' => 98,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 391,
            'questao_id' => 98,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 392,
            'questao_id' => 98,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 393,
            'questao_id' => 99,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 394,
            'questao_id' => 99,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 395,
            'questao_id' => 99,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 396,
            'questao_id' => 99,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 397,
            'questao_id' => 100,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 398,
            'questao_id' => 100,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 399,
            'questao_id' => 100,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 400,
            'questao_id' => 100,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 401,
            'questao_id' => 101,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 402,
            'questao_id' => 101,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 403,
            'questao_id' => 101,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 404,
            'questao_id' => 101,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 405,
            'questao_id' => 102,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 406,
            'questao_id' => 102,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 407,
            'questao_id' => 102,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 408,
            'questao_id' => 102,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 409,
            'questao_id' => 103,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 410,
            'questao_id' => 103,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 411,
            'questao_id' => 103,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 412,
            'questao_id' => 103,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 413,
            'questao_id' => 104,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 414,
            'questao_id' => 104,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 415,
            'questao_id' => 104,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 416,
            'questao_id' => 104,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 417,
            'questao_id' => 105,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 418,
            'questao_id' => 105,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 419,
            'questao_id' => 105,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 420,
            'questao_id' => 105,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 421,
            'questao_id' => 106,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 422,
            'questao_id' => 106,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 423,
            'questao_id' => 106,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 424,
            'questao_id' => 106,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 425,
            'questao_id' => 107,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 426,
            'questao_id' => 107,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 427,
            'questao_id' => 107,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 428,
            'questao_id' => 107,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 429,
            'questao_id' => 108,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 430,
            'questao_id' => 108,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 431,
            'questao_id' => 108,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 432,
            'questao_id' => 108,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 433,
            'questao_id' => 109,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 434,
            'questao_id' => 109,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 435,
            'questao_id' => 109,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 436,
            'questao_id' => 109,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 437,
            'questao_id' => 110,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 438,
            'questao_id' => 110,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 439,
            'questao_id' => 110,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 440,
            'questao_id' => 110,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 441,
            'questao_id' => 111,
            'resposta' => 'Enquanto o UDP possui endereçamento de processos próprio, o TCP precisa utilizar o mesmo ID de processo do sistema operacional.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 442,
            'questao_id' => 111,
            'resposta' => '*A Web e o FTP utilizam o TCP enquanto a aplicação echo e o TFTP utilizam o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 443,
            'questao_id' => 111,
            'resposta' => 'O UDP e o TCP conseguem endereçar até 1024 portas, que são os endereços dos processos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 444,
            'questao_id' => 111,
            'resposta' => 'Uma aplicação que precisa de velocidade, utiliza o TCP enquanto uma aplicação que precisa de garantida de entrega utiliza o UDP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 445,
            'questao_id' => 112,
            'resposta' => '*Um Sistema Operacional executado em uma máquina virtual apresenta um desempenho superior ao que alcançaria quando executado diretamente na mesma máquina física.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 446,
            'questao_id' => 112,
            'resposta' => 'As máquinas virtuais permitem a um desenvolvedor testar as suas aplicações em Linux, FreeBSD, Windows 2012 e Windows XP concorrentemente em um mesmo computador físico.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 447,
            'questao_id' => 112,
            'resposta' => 'Um sistema operacional executado em uma máquina virtual utiliza um subconjunto da memória física disponível na máquina.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 448,
            'questao_id' => 112,
            'resposta' => 'A utilização de máquinas virtuais gera economia de energia elétrica e de gastos com hardware.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 449,
            'questao_id' => 113,
            'resposta' => '100 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 450,
            'questao_id' => 113,
            'resposta' => '12,5 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 451,
            'questao_id' => 113,
            'resposta' => '80 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 452,
            'questao_id' => 113,
            'resposta' => '*800 segundos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 453,
            'questao_id' => 114,
            'resposta' => 'O endereço IPV4 192.168.0.1 é de classe C e o endereço IPV4 10.15.0.1 é de Classe B.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 454,
            'questao_id' => 114,
            'resposta' => 'A abreviação do endereço IPV6 ABCD:0000:0000:0000:1234:0000:0000:FADA é ABCD::1234::FADA.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 455,
            'questao_id' => 114,
            'resposta' => 'Considere uma rede de testes em que se tem um computador e um servidor de rede com compartilhamento liberado para todos e ligados a uma mesma VLAN de um switch. Se o computador for configurado com o IPV4 192.168.0.1/24 e o servidor for configurado com o IPV4 192.168.1.2/24 o computador conseguirá ter acesso ao servidor de rede.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 456,
            'questao_id' => 114,
            'resposta' => '*Quando dois computadores configurados com o IPV4 192.168.1.1 e 192.168.1.2 acessam um servidor WEB através de um Firewall com NAT configurado com o IPV4 200.243.217.1, o endereço IP de origem dos acessos que chegam até o servidor WEB é 200.243.217.1. ',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 457,
            'questao_id' => 115,
            'resposta' => 'Rich Faces, Django e Cake são frameworks que têm como base a linguagem PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 458,
            'questao_id' => 115,
            'resposta' => 'os pacotes de frameworks PHP substituem a funcionalidade dos servidores Web, sendo dispensável a instalação destes quando tais pacotes são utilizados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 459,
            'questao_id' => 115,
            'resposta' => 'é impossível desenvolver código PHP puro quando se utiliza um framework para desenvolvimento.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 460,
            'questao_id' => 115,
            'resposta' => '*apesar de ser disponibilizado pela mesma empresa que mantém o desenvolvimento do interpretador PHP, o Zend Framework não é o mais utilizado pelos desenvolvedores PHP.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 461,
            'questao_id' => 116,
            'resposta' => 'é necessário pagar licença de uso para tais ferramentas, apesar de PHP ser uma linguagem livre.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 462,
            'questao_id' => 116,
            'resposta' => '*o código utilizado para gerar uma aplicação em um framework possui baixa portabilidade, pois contém instruções e objetos específicos daquele framework.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 463,
            'questao_id' => 116,
            'resposta' => 'estes têm baixa penetração no mercado, dada a dificuldade de aprendizado das ferramentas.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 464,
            'questao_id' => 116,
            'resposta' => 'temos total liberdade de definir a estrutura da aplicação e sua localização dentro do servidor Web.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 465,
            'questao_id' => 117,
            'resposta' => 'só podemos desenvolver aplicações em ambiente Linux, Unix ou MacOS, pois é uma plataforma disponibilizada apenas para tais sistemas operacionais.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 466,
            'questao_id' => 117,
            'resposta' => 'não podemos definir rotas e caminhos de ações a serem executadas ao recebermos requisições Web, pois a estrutura da aplicação com Laravel é rígida.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 467,
            'questao_id' => 117,
            'resposta' => '*somos obrigados a obedecer a algumas convenções de nomeação de classes e tabelas de banco se quisermos usufruir de suas ferramentas de integração entre PHP e bancos de dados.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 468,
            'questao_id' => 117,
            'resposta' => 'somos obrigados a desenvolver páginas Web com os modelos HTML oferecidos pelo framework, sendo vetada a importação de modelos externos.',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 469,
            'questao_id' => 118,
            'resposta' => ':text(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 470,
            'questao_id' => 118,
            'resposta' => ':search(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 471,
            'questao_id' => 118,
            'resposta' => ':has(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 472,
            'questao_id' => 118,
            'resposta' => '*:contains(texto)',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 473,
            'questao_id' => 119,
            'resposta' => 'switchClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 474,
            'questao_id' => 119,
            'resposta' => 'changeClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 475,
            'questao_id' => 119,
            'resposta' => 'addOrRemoveClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 476,
            'questao_id' => 119,
            'resposta' => '*toggleClass()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 477,
            'questao_id' => 120,
            'resposta' => 'ancestor()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 478,
            'questao_id' => 120,
            'resposta' => '*parent()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 479,
            'questao_id' => 120,
            'resposta' => 'parents()',
            'usuarioAtualizacao' => 2,
        ]);
        DB::table('respostas')->insert([
            'id' => 480,
            'questao_id' => 120,
            'resposta' => 'prev()',
            'usuarioAtualizacao' => 2,
        ]);
    }
}
