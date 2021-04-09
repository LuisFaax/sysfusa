<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proceso;

class ProcesosCatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proceso::create([
        	'proceso' => 'COMPETENCIA DESLEAL'
        ]);
         Proceso::create([
        	'proceso' => 'CONCILIACIÓN EXTRAJUDICIAL'
        ]);
          Proceso::create([
        	'proceso' => 'DECLARATIVOS - ESPECIALES - DESLINDE Y AMOJONAMIENTO'
        ]);
           Proceso::create([
        	'proceso' => 'DECLARATIVOS - ESPECIALES - DIVISORIO'
        ]);
            Proceso::create([
        	'proceso' => 'DECLARATIVOS - ESPECIALES - EXPROPIACIÓN'
        ]);

    }
}
