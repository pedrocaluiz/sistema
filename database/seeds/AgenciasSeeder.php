<?php

use Illuminate\Database\Seeder;

class AgenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agencias')->insert([
            'codigoUnidade' => 1209,
            'descricao' => 'BARRA BONITA', 
            'SR' => 2585,
            'DIRE' => 2185,
            'usuarioAtualizacao' => 1]);

        DB::table('agencias')->insert([
            'codigoUnidade' => 3254,
            'descricao' => 'JOAO RIBEIRO DE BARROS', 
            'SR' => 2585,
            'DIRE' => 2185,
            'usuarioAtualizacao' => 1]);
                
        DB::table('agencias')->insert([
            'codigoUnidade' => 1770,
            'descricao' => 'IGARACU DO TIETE', 
            'SR' => 2585,
            'DIRE' => 2185,
            'usuarioAtualizacao' => 1]);

        DB::table('agencias')->insert([
            'codigoUnidade' => 2032,
            'descricao' => 'TERRA ROXA', 
            'SR' => 2585,
            'DIRE' => 2185,
            'usuarioAtualizacao' => 1]);


    }
}
