<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Decision;

class DecisionesCatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Decision::create([
        	'decision' => 'AUTO DE SUSTANCIACION'
        ]);
         Decision::create([
        	'decision' => 'AUTO INTERLOCUTORIO'
        ]);
          Decision::create([
        	'decision' => 'SENTENCIA PRIMERA INSTANCIA'
        ]);
           Decision::create([
        	'decision' => 'SENTENCIA SEGUNDA INSTANCIA'
        ]);
            Decision::create([
        	'decision' => 'AUDIENCIA'
        ]);
             Decision::create([
        	'decision' => 'RECEPCION MEMORIAL Y/O EXPEDIENTE'
        ]);
              Decision::create([
        	'decision' => 'AL DESPACHO'
        ]);
               Decision::create([
        	'decision' => 'NOTIFICACION POR ESTADO'
        ]);
                Decision::create([
        	'decision' => 'NOTIFICACION POR CORREO ELECTRONICO'
        ]);
                 Decision::create([
        	'decision' => 'NOTIFICACION POR CONDUCTA CONCLUYENTE'
        ]);
    }
}
