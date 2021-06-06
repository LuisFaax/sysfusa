<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radicado extends Model
{
	use HasFactory;

	protected $fillable = ['cup','juzgado_id','tipo','tipo_proceso_id','fecha_radicar','numero','cuaderno','depto_id','municipio_id','entidad_id','folios','fecha_presenta','user_id','descripcion','estatus'];

	public static $RadicacionRules =[
		'cup' => 'required',
		'juzgado' => 'required|not_in:Elegir',
		'processType' => 'required|not_in:Elegir',
		'otroTipo' => 'required|not_in:Elegir',
		'radicacionDate' => 'required',
		'notebook' => 'required',
		'deptoProceso' => 'required|not_in:Elegir',
		'municipality' => 'required|not_in:Elegir',
		'entity' => 'required|not_in:Elegir',
		'folios' => 'required',
		'presentationDate' => 'required',
		'description' => 'max:2500',
		
	];
	public static $RadicacionMessages =[
		'cup.required' => 'El código único de proceso es requerido',
		'juzgado.required' => 'El nombre del juzgado es requerido',
		'juzgado.not_in' => 'Elegir no es una opción válida',
		'processType.required' => 'El tipo de instancia es requerido',
		'processType.not_in' => 'Elegir no es una opción válida',
		'otroTipo.required' => 'El tipo de proceso es requerido',
		'otroTipo.not_in' => 'Elegir no es una opción válida',
		'radicacionDate.required' => 'La fecha de radicación es requerida',
		'notebook.required' => 'El cuaderno es requerido',
		'deptoProceso.required' => 'El departamento del tipo de proceso es requerido',
		'deptoProceso.not_in' => 'Elegir no es una opción válida',
		'municipality.required' => 'El municipio es requerido',
		'municipality.not_in' => 'Elegir no es una opción válida',
		'entity.required' => 'La entidad es requerida',
		'entity.not_in' => 'Elegir no es una opción válida',
		'folios.required' => 'Los folios son requeridos',
		'presentationDate.required' => 'La fecha de presentación es requerida',
		'description.max' => 'La cantidad de caracteres en la descripción deben ser máximo 2500',		
	];

	public static $PersonRules = [
		'cup' => 'required',
		'personType' => 'required|not_in:Elegir',
		'name' => 'required',
		'identification' => 'required',
		'typeIdentification' => 'required|not_in:Elegir',
		'email' => 'required|email',
		'phone' => 'required',
		'personTypeDian' => 'required|not_in:Elegir',
		'age' => 'required|not_in:Elegir',
		'ethnicGroup' => 'required|not_in:Elegir',
		'disabled' => 'required|not_in:Elegir',
		'gender' => 'required|not_in:Elegir',
		'address' => 'required',		
		'deptoPerson' => 'required|not_in:Elegir',
		'city' => 'required|not_in:Elegir',
	];
	public static $PersonMessages = [
		'cup.required' => 'El código único de proceso es requerido',
		'personType.required' => 'El tipo de persona es requerido[DEMANDADO, DEMANDANTE...]',
		'personType.not_in' => 'Elegir no es una opción válida',
		'name.required' => 'El nombre es requerido',
		'identification.required' => 'La identificación es requerida',
		'typeIdentification.required' => 'El tipo de identificación es requerido',
		'typeIdentification.not_in' => 'Elegir no es una opción válida',
		'email.required' => 'El email es requerido',
		'email.email' => 'El email es inválido',
		'phone.required' => 'El teléfono es requerido',
		'personTypeDian.required' => 'El tipo de persona es requerido[Natural, Jurídica]',
		'personTypeDian.not_in' => 'Elegir no es una opción válida',
		'age.required' => 'La edad es requerida',
		'age.not_in' => 'Elegir no es una opción válida',
		'ethnicGroup.required' => 'El grupo étnico es requerido',
		'ethnicGroup.not_in' => 'Elegir no es una opción válida',
		'disabled.required' => 'El campo discapacitado es requerido',
		'disabled.not_in' => 'Elegir no es una opción válida',
		'gender.required' => 'El género es requerido',
		'gender.not_in' => 'Elegir no es una opción válida',
		'deptoPerson.required' => 'El departamento de la persona es requerido',
		'deptoPerson.not_in' => 'Elegir no es una opción válida',
		'city.required' => 'La ciudad es requerida',
		'city.not_in' => 'Elegir no es una opción válida',
		'address.required' => 'La dirección de la persona es requerida',			
	];
	public static $PersonRulesEdit = [
		'type' => 'required|not_in:Elegir',
		'name' => 'required|min:6',
		'identification' => 'required|min:3',
		'email' => 'required|email',
		'phone' => 'required|min:10',
		'address' => 'required|min:5',
	];
	public static $PersonMessagesEdit = [
		'type.required' => 'Elige el tipo de persona',
		'type_id.not_id' => 'Elige un tipo de persona distinto a Elegir',
		'name.required' => 'El nombre es requerido',
		'name.min' => 'El nombre debe tener mínimo 6 caracteres',
		'identification.required' => 'La identificación es requerida',
		'identification.min' => 'La identificación  debe tener mínimo 3 caracteres',
		'email.required' => 'El correo email es requerido',
		'email.email' => 'El email es inválido',
		'phone.required' => 'El teléfono es requerido',
		'phone.min' => 'El teléfono debe ser a 10 dígitos',			
		'address.required' => 'La dirección física es requerida',
		'address.min' => 'La dirección física debe tener al menos 5 caracteres',

	];


	// Relaciones eloquent
	public function personas()
	{
		return $this->hasMany(Persona::class);
	}
	public function demandantes()
	{
		return $this->hasMany(Persona::class)->where('tipo_persona','like', '%DEMANDANTE%');
	}
	public function demandados()
	{
		return $this->hasMany(Persona::class)->where('tipo_persona','like', '%DEMANDADO%');
	}
	public function adjuntos()
	{
		return $this->hasMany(Adjunto::class);
	}
	public function juzgado()
	{
		return $this->belongsTo(JuzgadoCatalogo::class);
	}
	public function actuaciones()
	{
		return $this->hasMany(Actuacion::class);
	}
	public function proceso()
	{
		// public function hasOne($related, $foreignKey = null, $localKey = null)
		return $this->hasOne(ProcesoCatalogo::class, 'id', 'tipo_proceso_id');
	}

}
