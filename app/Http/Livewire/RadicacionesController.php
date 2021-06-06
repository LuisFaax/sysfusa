<?php

namespace App\Http\Livewire;

use App\Models\Adjunto;
use App\Models\Atachment;
use App\Models\DepartamentoCatalogo;
use App\Models\EntidadCatalogo;
use App\Models\Juzgado;
use App\Models\JuzgadoCatalogo;
use App\Models\Municipio;
use App\Models\Person;
use App\Models\Persona;
use App\Models\ProcesoCatalogo;
use App\Models\Radicado;
use App\Services\PersonService;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
//use Illuminate\Session\SessionManager;

class RadicacionesController extends Component
{
	use WithPagination;
	use WithFileUploads;
	protected $cartService;

	public $cup,$juzgado,$genero,$processType,$otroTipo,$radicacionDate,$numero,$notebook,$description,$entity,$municipality,$typeIdentification,$city,$deptoPerson,$deptoProceso,$folios,$presentationDate, $cupfinal;
	// persona
	public $type,$name,$email,$personType,$personTypeDian,$ethnicGroup,$gender,$address,$identification,$phone,$age,$disabled;
	// adjuntos
	public $atachFile,$atachType,$uploading;
	// componente
	public $radicado, $search, $selected_id, $pageTitle,$componentName,$modal,$personSelected,$person_selectedid;
	private $pagination = 3;




	public function mount()
	{		
		$this->pageTitle = 'Listado';
		$this->componentName = 'Radicaciones';
		$this->cup = $this->generate_id(6);	
		$this->genero = 'Elegir';
		$this->processType = 'Elegir';		
		$this->personType = 'Elegir';
		$this->personTypeDian = 'Elegir';
		$this->ethnicGroup = 'Elegir';
		$this->gender = 'Elegir';
		$this->age = 'Elegir';
		$this->disabled = 'Elegir';
		$this->modal = false;
		$this->personSelected = false;
		$this->person_selectedid = 0;
		$this->atachType = 'Poder';
		$this->typeIdentification = 'Elegir';
		$this->juzgado = 'Elegir';
		$this->city = 'Elegir';
		$this->entity = 'Elegir';
		$this->deptoPerson = 'Elegir';
		$this->otroTipo = 'Elegir';
		//$this->uploading = false;

		//al entrar a radicaciones se genera el cup único de sesión
	}


	public function render()
	{    	

		//dd(session('cup'));
		if(strlen($this->search) > 0)
			$data = Radicado::where('radicado', 'like', '%' . $this->search . '%')->paginate($this->pagination);
		else
			$data= Radicado::orderBy('id','asc')->paginate($this->pagination);

		return view('livewire.radicaciones.component',[
			'data' => $data,
			'persons' => Person::where('user_id', Auth()->user()->id)
			->where('cup', Session::get('cup'))
			->orderBy('name','asc')
			->get(),
			'atachments' => Atachment::where('user_id', Auth()->user()->id)
			->where('cup', Session::get('cup'))
			->orderBy('filename','asc')
			->get(),
			'juzgados' => JuzgadoCatalogo::orderBy('juzgado','desc')->get(),
			'entidades' => EntidadCatalogo::orderBy('entidad','desc')->get(),
			'municipios' => Municipio::orderBy('municipio','desc')->get(),
			'departamentos' => DepartamentoCatalogo::orderBy('departamento','desc')->get(),
			'procesostipo' => ProcesoCatalogo::orderBy('proceso','desc')->get()
		])
		->extends('layouts.theme.app')
		->section('content');
	}






	// reset values inputs
	public function resetUI($changeModalView = 0)
	{
		$this->radicado ='';	
		$this->phone ='';	
		$this->search ='';
		$this->cupfinal ='';
		$this->selected_id = 0;
		$this->modal = ( $changeModalView == 1 ? true : false );
		$this->personSelected = false;
		$this->person_selectedid = 0;
		$this->pageTitle = 'Listado';
		$this->resetErrorBag();
	}	
	public function uploadingFiles()
	{
		$this->atachFile = '';
	}
	public function resetPersonInfo()
	{
		$this->name = '';
		$this->identification ='';
		$this->email = '';
		$this->phone = '';
		$this->address = '';
		$this->personSelected = false;
		$this->person_selectedid = 0;
		$this->resetErrorBag();
	}

	//events listeners
	protected $listeners = [
		'deleteRow'   => 'Destroy',
		'deleteAtachment',
		'deletePerson',
		'editCup' => 'editCup'
	]; 

	public function Destroy($id)
	{
		if ($id) { 
			$radicado = Radicado::find($id);				

			$radicado->delete();

			$this->resetUI();
			$this->emit('radicado-deleted', 'Radicado Eliminado');
		}
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



	public function addPerson()
	{
			//validar si ya existe			
		$personExists;
		if($this->selected_id < 1){
			$personExists = Person::where('identification',$this->identification)		
			->where('user_id', Auth()->user()->id)
			->count();
		} else {
			$personExists = Person::where('identification',$this->identification)
			->where('user_id', Auth()->user()->id)
			->where('id','<>', $this->identification)
			->count();
		}


		if($personExists > 0)
		{
			$this->emit('person-exists',"YA AGREGASTE UNA PERSONA CON LA IDENTIFICACIÓN: {$this->identification}");
			return;
		}

		

		$this->validate(Radicado::$PersonRules, Radicado::$PersonMessages);



			//$now = Carbon::now();
			//$uid = $now->format('His') . '';

			//'radicado_id' =>$this->deptoPerson NO LO TENEMOS 
		Person::create([
			'cup' => Session::get('cup'),
			'person_type'=> $this->personType,
			'name' => $this->name,
			'identification'=> $this->identification,
			'identification_type'=> $this->typeIdentification,
			'email' => $this->email,
			'phone'=> $this->phone,
			'person_type_dian'=> $this->personTypeDian,
			'age'=> $this->age,
			'ethnic_group'=> $this->ethnicGroup,
			'disabled'=> $this->disabled,
			'gender'=> $this->gender, 
			'address'=> $this->address,
			'user_id' => Auth()->user()->id,			
			'depto_id' =>$this->deptoPerson,
			'city_id' =>$this->city,
		]);

		$this->resetPersonInfo();
		$this->emit('person-added','Persona agregada');

	}

	public function changeView($option)
	{
		if($option == 1) {
			$this->pageTitle = 'Crear';
			$this->modal = true;
		}
		if($option == 2) {
			$this->pageTitle = 'Agregar Persona';
		}
	}

	public function editPerson(Person $person)
	{			 
		if($person->count() > 0)
		{
			$this->name = $person->name;
			$this->email = $person->email;
			$this->type = $person->type;
			$this->personType = $person->person_type;
			$this->ethnicGroup = $person->ethnic_group;
			$this->gender = $person->gender;
			$this->address = $person->address;
			$this->identification = $person->identification;
			$this->phone = $person->phone;
			$this->age = $person->age;
			$this->disabled = $person->disabled;
			$this->personSelected = true;
			$this->person_selectedid = $person->id;
			$this->emit('edit-info-loaded');
		}
	}


	public function updatePerson()
	{
		//validar no duplicidad de personas
		$personExists = Person::where('identification',$this->identification)
		->where('userid', Auth()->user()->id)
		->where('id','<>', $this->person_selectedid)
		->count();	

		if($personExists > 0)
		{
			$this->emit('person-exists',"YA AGREGASTE OTRA PERSONA CON LA IDENTIFICACIÓN: {$this->identification}");
			return;
		}

		$this->validate(Radicado::$PersonRulesEdit, Radicado::$PersonMessagesEdit);

		


		$person = Person::find($this->person_selectedid);
		$person->update([
			'userid' => Auth()->user()->id,
			'name' => $this->name,
			'email' => $this->email,
			'type'=> $this->type,
			'person_type'=> $this->personType,
			'ethnic_group'=> $this->ethnicGroup,
			'gender'=> $this->gender, 
			'address'=> $this->address,
			'identification'=> $this->identification,
			'phone'=> $this->phone,
			'age'=> $this->age,
			'disabled'=> $this->disabled				
		]);

		$this->resetPersonInfo();
		$this->emit('person-updated','Persona actualizada');
	}
	public function cancelEdit()
	{	
		$this->name = '';
		$this->email = '';
		$this->identification = '';
		$this->address = '';
		$this->personSelected = false;					
	}

	public function addAtachment()
	{
		$atach = Atachment::create([
			'user_id' => Auth()->user()->id,
			'cup'    => Session::get('cup'),
			'type'   => $this->atachType
		]);

		$this->uploading = true;

		if($this->atachFile){
			$customFileName	 = Session::get('cup') . '_' . uniqid() . '_.' . $this->atachFile->extension();	
			$this->atachFile->storeAs('public/atachments/radicaciones/', $customFileName);
			$atach->filename = $customFileName;
			$atach->save();
		}

		//$this->atachFile = '';
		$this->atachType = '';
	}


	public function deletePerson(Person $person)
	{				

		$person->delete();
		$this->resetUI();
		$this->emit('radicado-deleted', 'Personaa eliminada');
		
	}
	public function deleteAtachment(Atachment $atachment)
	{		
		if(file_exists('storage/atachments/radicaciones/' . $atachment->filename ))
		{
			unlink('storage/atachments/radicaciones/' . $atachment->filename);
		}

		$atachment->delete();
		$this->emit('atachment-deleted','Archivo eliminado');
	}



	//método para guardar radicación
	public function Store()
	{
		//ejecutar validaciones
		$result = $this->validate(Radicado::$RadicacionRules, Radicado::$RadicacionMessages);

		// validar personas agregadas
		$personsAdded = Person::where('cup', Session::get('cup'))->get();
		if($personsAdded->count() < 1)
		{
			$this->emit('person-missing',"DEBES AGREGAR LAS PERSONAS DE LA RADICACIÓN");
			return;
		}
		// validar adjuntos agregados
		$atachmentsAdded = Atachment::where('cup', Session::get('cup'))->get();
		if($atachmentsAdded->count() < 1)
		{
			$this->emit('atachment-missing',"DEBES AGREGAR LOS DOCUMENTOS EN LA SECCIÓN ADJUNTOS");
			return;
		}
		

		DB::beginTransaction();
		
		try {
			//guardar radicacion
			$radicado = Radicado::create([
				'cup' => Session::get('cup'),
				'juzgado_id' => $this->juzgado,
				'tipo' => $this->processType,
				'tipo_proceso_id' => $this->otroTipo,
				'fecha_radicar' => $this->radicacionDate,
				'numero' => $this->numero,
				'cuaderno' => $this->notebook,
				'depto_id' => $this->deptoProceso,
				'municipio_id' => $this->municipality,
				'entidad_id' => $this->entity,
				'folios' => $this->folios,
				'fecha_presenta' => $this->presentationDate,
				'user_id' => Auth()->user()->id,
				'descripcion' => $this->description
			]);

		// guardar sujetos
			foreach ($personsAdded as $person) {
				Persona::create([
					'cup' => Session::get('cup'),
					'tipo_persona' => $person->person_type,
					'nombre' => $person->name,
					'identificacion' =>$person->identification,
					'tipo_identificacion' =>$person->identification_type,
					'email' => $person->email,
					'telefono' =>$person->phone,
					'tipo_dian' =>$person->person_type_dian,
					'edad' =>$person->age,
					'grupo' =>$person->ethnic_group,
					'discapacitado' =>$person->disabled,
					'genero' =>$person->gender,
					'direccion' =>$person->address,
					'radicado_id' => $radicado->id,
					'depto_id' => $person->depto_id,
					'ciudad_id' => $person->city_id,
					'user_id' => Auth()->user()->id
				]);
			}
			

		// guardar adjuntos 	
			foreach ($atachmentsAdded as $atach) {
				Adjunto::create([
					'radicado_id' => $radicado->id,
					'cup' => Session::get('cup'),
					'archivo' =>$atach->filename,
					'tipo' =>$atach->type
				]);
			}	
			


			DB::commit();
			Session::forget('cup');
			Atachment::where('user_id', Auth()->user()->id)->delete();
			Person::where('user_id', Auth()->user()->id)->delete();
			//se envia correo al empleado del juzgado

			// se envia copia del email al usuario que radico

			// se emite eventos al front
			$this->resetUI();
			$this->emit('radicar-added','RADICACIÓN REGISTRADA CON ÉXITO');
		} catch (Exception $e) {
			DB::rollback();
			dd($e->message());
		}
		

	}
	
	public function editCup($id)
	{
		$this->selected_id = $id;
		$this->emit('modalCup-show');
	}

	public function ChangeCup()
	{
		$rules = [
			'cupfinal' => "required|min:23|unique:radicados,numero,{$this->selected_id}"
		];
		$messages = [
			'cupfinal.required' => 'Ingresa el número único de proceso',
			'cupfinal.min' => 'El código único de proceso debe tener 23 caracteres',
			'cupfinal.unique' => 'El código único de proceso ya está registrado en otro radicado',
		];		
		$this->validate($rules, $messages);

		$radicado = Radicado::find($this->selected_id);

		$radicado->numero = $this->cupfinal;
		$radicado->update();

		$this->resetUI();
		$this->emit('cup-updated','EL CÓDIGO ÚNICO DE PROCESO FUÉ ACTUALIZADO');
		//enviar correo al juzgado
		//enviar correo a quien hizo la radicación

	}
	
	public function changeEstatus(Radicado $radicado)
	{
		$radicado->estatus = ($radicado->estatus == 'Abierta' ? 'Cerrada' : 'Abierta');
		$radicado->update();

		$this->resetUI();
		$this->emit('estatus-updated','ESTATUS ACTUALIZADO CON ÉXITO');
	}


}
