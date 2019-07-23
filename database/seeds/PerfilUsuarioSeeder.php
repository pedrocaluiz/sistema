<?php

use Illuminate\Database\Seeder;

class PerfilUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfil_usuario')->insert([
            'perfil_id' => 1,
            'user_id' => 1]);
        DB::table('perfil_usuario')->insert([
            'perfil_id' => 2,
            'user_id' => 2]);
        DB::table('perfil_usuario')->insert([
            'perfil_id' => 3,
            'user_id' => 2]);

    }
}
