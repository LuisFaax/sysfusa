<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujeto extends Model
{
	use HasFactory;

	protected $fillable = [
							'cup','tipo_persona',
							'nombre','identificacion',
							'email','telefono',
							'tipo_dian','edad',
							'grupo','discapacitado',
							'genero','direccion',
							'radicado_id'
						];
}
