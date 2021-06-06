<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Seeder;
use App\Models\Adjunto;
use App\Models\Persona;
use App\Models\Radicado;
use Carbon\Carbon;
use DB;

class RadicarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // radicado    
        $dt = Carbon::now();
        $numTemp = $this->generate_id(6);
        $radicado = Radicado::create([
            'cup' => $numTemp,
            'juzgado_id' => 1,
            'tipo' => 1,
            'tipo_proceso_id' => 1,
            'fecha_radicar' => $dt->toDateString(),
            'numero' => '',
            'cuaderno' => '1500',
            'depto_id' => 1,
            'municipio_id' => 1,
            'entidad_id' => 1,
            'folios' => '1001,1002',
            'fecha_presenta' =>  $dt->toDateString(),
            'user_id' => 1,
            'descripcion' => 'Una descripcion'
        ]);

        // sujetos
        Persona::create([
            'cup' => $numTemp,
            'tipo_persona' => 'DEMANDANTE',
            'nombre' => 'LUIS FAX',
            'identificacion' =>'8529874',
            'tipo_identificacion' =>'PASAPORTE',
            'email' => 'luisfax@gmail.com',
            'telefono' => '3219879634',
            'tipo_dian' =>'Natural',
            'edad' => 'Mayo de 60 años',
            'grupo' => 'Mestizo',
            'discapacitado' =>'NO',
            'genero' => 'HOMBRE',
            'direccion' =>'MÉXICO',
            'radicado_id' => $radicado->id,
            'depto_id' => 1,
            'ciudad_id' => 1,
            'user_id' => 1
        ]);
        
        // adjuntos
        Adjunto::create([
            'radicado_id' => $radicado->id,
            'cup' => $numTemp,
            'archivo' =>'',
            'tipo' =>'Poder'
        ]);

    }

    public function generate_id($strength = 6) {
        //dd('generate_id');
        $input = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        $d = DB::table('INFORMATION_SCHEMA.TABLES')
        ->select('AUTO_INCREMENT as id')
        ->where('TABLE_SCHEMA','sysfusa')
        ->where('TABLE_NAME','radicados')
        ->get();

        $uid = $d[0]->id . $random_string;

        if(!session()->exists('cup'))
        {                       
            Session::put('cup', $uid);
        } 

        //1ZEVC9Z
        return Session::get('cup');     
    }
}
