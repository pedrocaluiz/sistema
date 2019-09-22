<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'primeiroNome' => 'Pedro',
            'ultimoNome' => 'Administrador',
            'email' => 'administrador@adm.com',
            'email_verified_at' => null,
            'password' => '$2y$10$Dvx9U4dBPD.0wJ5Jug1CEuhG4KFWlua2xVaLEV4.SMh5F6kLdi3O2',
            'foto' => null,
            'cargo_id' => '1',
            'funcao_id' => '3',
            'agencia_id' => '1',
            'dataNascimento' => '1992-12-22',
            'matricula' => 'c123710-6',
            'dataAdmissao' => '2012-08-13',
            'endereco' => 'Rua Jose Edis Luciano',
            'numero' => '165',
            'complemento' => 'Casa',
            'bairro' => 'Jd Europa',
            'CEP' => '17.320-000',
            'municipio_id' => '5043',
            'telefone' => '(14)3646-1003',
            'celular' => '(14)99739-8158',
            'ativo' => 1]);

        DB::table('users')->insert([
            'primeiroNome' => 'Pedro',
            'ultimoNome' => 'Instrutor',
            'email' => 'instrutor@instrutor.com',
            'email_verified_at' => null,
            'password' => '$2y$10$IA2xp29HGEThOVBY83Dc9OwuZLww2yOucCzWSwlqSR4aaXjIw7c3u',
            'foto' => null,
            'cargo_id' => '2',
            'funcao_id' => '1',
            'agencia_id' => '3',
            'dataNascimento' => '1992-12-22',
            'matricula' => 'c123710-6',
            'dataAdmissao' => '2012-08-13',
            'endereco' => 'Rua Jose Edis Luciano',
            'numero' => '165',
            'complemento' => 'Casa',
            'bairro' => 'Jd Europa',
            'CEP' => '17.320-000',
            'municipio_id' => '5043',
            'telefone' => '(14)3646-1003',
            'celular' => '(14)99739-8158',
            'ativo' => 1]);

        DB::table('users')->insert([
            'primeiroNome' => 'Pedro',
            'ultimoNome' => 'Aluno1',
            'email' => 'aluno1@aluno.com',
            'email_verified_at' => null,
            'password' => '$2y$10$Hy57CMZ2h5bBANU5Kw4w/uzdv1FR/.QkX7dZlW5prQ/MTbSTU5kfa',
            'foto' => null,
            'cargo_id' => '2',
            'funcao_id' => '1',
            'agencia_id' => '3',
            'dataNascimento' => '1992-12-22',
            'matricula' => 'c123710-6',
            'dataAdmissao' => '2012-08-13',
            'endereco' => 'Rua Jose Edis Luciano',
            'numero' => '165',
            'complemento' => 'Casa',
            'bairro' => 'Jd Europa',
            'CEP' => '17.320-000',
            'municipio_id' => '5043',
            'telefone' => '(14)3646-1003',
            'celular' => '(14)99739-8158',
            'ativo' => 1]);

        DB::table('users')->insert([
            'primeiroNome' => 'Pedro',
            'ultimoNome' => 'Aluno2',
            'email' => 'aluno2@aluno.com',
            'email_verified_at' => null,
            'password' => '$2y$10$Hy57CMZ2h5bBANU5Kw4w/uzdv1FR/.QkX7dZlW5prQ/MTbSTU5kfa',
            'foto' => null,
            'cargo_id' => '2',
            'funcao_id' => '1',
            'agencia_id' => '3',
            'dataNascimento' => '1992-12-22',
            'matricula' => 'c123710-6',
            'dataAdmissao' => '2012-08-13',
            'endereco' => 'Rua Jose Edis Luciano',
            'numero' => '165',
            'complemento' => 'Casa',
            'bairro' => 'Jd Europa',
            'CEP' => '17.320-000',
            'municipio_id' => '5043',
            'telefone' => '(14)3646-1003',
            'celular' => '(14)99739-8158',
            'ativo' => 1]);
    }
}
