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
        $this->call(AgenciasSeeder::class);
        $this->call(CargosSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(FuncoesSeeder::class);
        $this->call(PerfisSeeder::class);
        $this->call(TipoMatSeeder::class);
        $this->call(TiposDocsSeeder::class);
        $this->call(PerfilUsuarioSeeder::class);
    }
}
