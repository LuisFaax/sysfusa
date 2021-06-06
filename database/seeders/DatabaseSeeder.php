<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(DecisionesCatalogoSeeder::class);
        $this->call(ProcesosCatalogoSeeder::class);
        $this->call(AnexosCatalogoSeeder::class);        
        $this->call(TableRolesSeeder::class);
        $this->call(RadicarTableSeeder::class);
    }
}
