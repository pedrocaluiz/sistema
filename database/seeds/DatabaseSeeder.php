<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*$this->call(EstadosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(AgenciasSeeder::class);
        $this->call(CargosSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(FuncoesSeeder::class);
        $this->call(PerfisSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TipoMatSeeder::class);
        $this->call(PerfilUsuarioSeeder::class);
        $this->call(CursosSeeder::class);
        $this->call(UnidadesSeeder::class);*/
        //$this->call(QuestoesSeeder::class);
        $this->call(RespostasSeeder::class);
        //$this->call(MateriaisSeeder::class);
    }
}
