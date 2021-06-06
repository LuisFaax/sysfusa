<?php

namespace Database\Seeders;

use App\Models\AnexoCatalogo;
use App\Models\DecisionCatalogo;
use App\Models\DepartamentoCatalogo;
use App\Models\EntidadCatalogo;
use App\Models\JuzgadoCatalogo;
use App\Models\Municipio;
use Illuminate\Database\Seeder;

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

        Municipio::create([
            'codigo' => '0100',
            'municipio' => 'Municipio1'
        ]);
        Municipio::create([
            'codigo' => '0101',
            'municipio' => 'Municipio2'
        ]);
        Municipio::create([
            'codigo' => '0102',
            'municipio' => 'Municipio3'
        ]);
        JuzgadoCatalogo::create([
            'customid' => '252903113001',
            'numero' =>'001',
            'juzgado' => 'JUZGADO 1 CIVIL CIRCUITO DE FUSAGASUGA',
            'email' => 'juzgado1@gmail.com'
        ]);
        JuzgadoCatalogo::create([
            'customid' => '252903113002',
            'numero' =>'002',
            'juzgado' => 'JUZGADO 2 CIVIL CIRCUITO DE FUSAGASUGA',
            'email' => 'juzgado2@gmail.com'
        ]);
        JuzgadoCatalogo::create([
            'customid' => '252903113003',
            'numero' =>'003',
            'juzgado' => 'JUZGADO 3 CIVIL CIRCUITO DE FUSAGASUGA',
            'email' => 'juzgado3@gmail.com'
        ]);
         EntidadCatalogo::create([
            'codigo' => '0100',
            'entidad' =>'CONSEJO SUPERIOR DE LA JUDICATURA-'
        ]);
         EntidadCatalogo::create([
            'codigo' => '0101',
            'entidad' =>'CONSEJO SUPERIOR DE LA JUDICATURA-SALA ADMINISTRATIVA'
        ]);
         EntidadCatalogo::create([
            'codigo' => '0325',
            'entidad' =>'CONSEJO DE ESTADO-SALA CONTENCIOSO ADMINISTRATIVA SECCIÓN SEGUNDA'
        ]);
         DepartamentoCatalogo::create([
            'codigo' => '25',
            'departamento' =>'Depto1'
        ]);
          DepartamentoCatalogo::create([
            'codigo' => '26',
            'departamento' =>'Depto2'
        ]);
        DepartamentoCatalogo::create([
            'codigo' => '27',
            'departamento' =>'Depto3'
        ]);
        /*
        DecisionCatalogo::create([           
            'decision' =>'AUTO DE SUSTANCIACION'
        ]);
         DecisionCatalogo::create([           
            'decision' =>'SENTENCIA PRIMERA INSTANCIA'
        ]);
          DecisionCatalogo::create([           
            'decision' =>'EMPLAZAMIENTO-REGISTRO NAL. EMPLAZADOS'
        ]);
        */


    }
}
