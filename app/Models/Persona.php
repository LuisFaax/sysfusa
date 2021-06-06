<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

      protected $fillable = ['cup','tipo_persona','nombre','identificacion','tipo_identificacion','email','telefono','tipo_dian','edad','grupo','discapacitado','genero','direccion','radicado_id','depto_id','ciudad_id','user_id'];


}
