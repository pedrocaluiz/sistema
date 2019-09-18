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
            'email' => 'adminsitrador@adm.com',
            'email_verified_at' => null,
            'password' => '$2y$10$VV4bAyviGwSC4U3eqbl7hunktvoyIfZgdZWcxn6ii6iEa016sY2ZS',
            'foto' => 'imagens/D32ne8tgWT7gGeTNl6C1Xr5ab8IVKQsO5ExUsfls.png',
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
            'password' => '$2y$10$VV4bAyviGwSC4U3eqbl7hunktvoyIfZgdZWcxn6ii6iEa016sY2ZS',
            'foto' => 'imagens/D32ne8tgWT7gGeTNl6C1Xr5ab8IVKQsO5ExUsfls.png',
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
            'password' => '$2y$10$VV4bAyviGwSC4U3eqbl7hunktvoyIfZgdZWcxn6ii6iEa016sY2ZS',
            'foto' => 'imagens/D32ne8tgWT7gGeTNl6C1Xr5ab8IVKQsO5ExUsfls.png',
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
            'password' => '$2y$10$VV4bAyviGwSC4U3eqbl7hunktvoyIfZgdZWcxn6ii6iEa016sY2ZS',
            'foto' => 'imagens/D32ne8tgWT7gGeTNl6C1Xr5ab8IVKQsO5ExUsfls.png',
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
