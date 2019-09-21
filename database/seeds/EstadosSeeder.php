<?php

use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert(['id' => '1', 'descricao' => 'Acre','sigla' => 'AC']);
        DB::table('estados')->insert(['id' => '2', 'descricao' => 'Alagoas','sigla' => 'AL']);
        DB::table('estados')->insert(['id' => '3', 'descricao' => 'Amazonas','sigla' => 'AM']);
        DB::table('estados')->insert(['id' => '4', 'descricao' => 'Amapá','sigla' => 'AP']);
        DB::table('estados')->insert(['id' => '5', 'descricao' => 'Bahia','sigla' => 'BA']);
        DB::table('estados')->insert(['id' => '6', 'descricao' => 'Ceará','sigla' => 'CE']);
        DB::table('estados')->insert(['id' => '7', 'descricao' => 'Distrito Federal','sigla' => 'DF']);
        DB::table('estados')->insert(['id' => '8', 'descricao' => 'Espírito Santo','sigla' => 'ES']);
        DB::table('estados')->insert(['id' => '9', 'descricao' => 'Goiás','sigla' => 'GO']);
        DB::table('estados')->insert(['id' => '10', 'descricao' => 'Maranhão','sigla' => 'MA']);
        DB::table('estados')->insert(['id' => '11', 'descricao' => 'Minas Gerais','sigla' => 'MG']);
        DB::table('estados')->insert(['id' => '12', 'descricao' => 'Mato Grosso do Sul','sigla' => 'MS']);
        DB::table('estados')->insert(['id' => '13', 'descricao' => 'Mato Grosso','sigla' => 'MT']);
        DB::table('estados')->insert(['id' => '14', 'descricao' => 'Pará','sigla' => 'PA']);
        DB::table('estados')->insert(['id' => '15', 'descricao' => 'Paraíba','sigla' => 'PB']);
        DB::table('estados')->insert(['id' => '16', 'descricao' => 'Pernambuco','sigla' => 'PE']);
        DB::table('estados')->insert(['id' => '17', 'descricao' => 'Piauí','sigla' => 'PI']);
        DB::table('estados')->insert(['id' => '18', 'descricao' => 'Paraná','sigla' => 'PR']);
        DB::table('estados')->insert(['id' => '19', 'descricao' => 'Rio de Janeiro','sigla' => 'RJ']);
        DB::table('estados')->insert(['id' => '20', 'descricao' => 'Rio Grande do Norte','sigla' => 'RN']);
        DB::table('estados')->insert(['id' => '21', 'descricao' => 'Rondônia','sigla' => 'RO']);
        DB::table('estados')->insert(['id' => '22', 'descricao' => 'Roraima','sigla' => 'RR']);
        DB::table('estados')->insert(['id' => '23', 'descricao' => 'Rio Grande do Sul','sigla' => 'RS']);
        DB::table('estados')->insert(['id' => '24', 'descricao' => 'Santa Catarina','sigla' => 'SC']);
        DB::table('estados')->insert(['id' => '25', 'descricao' => 'Sergipe','sigla' => 'SE']);
        DB::table('estados')->insert(['id' => '26', 'descricao' => 'São Paulo','sigla' => 'SP']);
        DB::table('estados')->insert(['id' => '27', 'descricao' => 'Tocantins','sigla' => 'TO']);
    }
}


