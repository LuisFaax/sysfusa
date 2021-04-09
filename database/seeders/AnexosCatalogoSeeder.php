<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnexoCatalogo;

class AnexosCatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnexoCatalogo::create([
        	'anexo' => 'PODER'
        ]);
        AnexoCatalogo::create([
        	'anexo' => 'COPIA ARCHIVO JUZGADO'
        ]);
        AnexoCatalogo::create([
        	'anexo' => 'COPIAS DEMANDA TRASLADOS'
        ]);
        AnexoCatalogo::create([
        	'anexo' => 'CERTIFICADO CATASTRAL'
        ]);
        AnexoCatalogo::create([
        	'anexo' => 'CERTIFICADO EXISTENCIA Y REP. LEGAL'
        ]);
        AnexoCatalogo::create([
        	'anexo' => 'CERTIFICADO DE TRADICION'
        ]);
        AnexoCatalogo::create([
        	'anexo' => 'CERTIFICADO ESPECIAL DE TRADICION'
        ]);
        AnexoCatalogo::create([
        	'anexo' => 'DEMANDA EN MENSAJE DE DATOS'
        ]);
        AnexoCatalogo::create([
        	'anexo' => 'AVALUO'
        ]);
        AnexoCatalogo::create([
        	'anexo' => 'CONTRATO ARRENDAMIENTO'
        ]);

    }
}
