<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JuzgadoCatalogo;

class JuzgadosCatalogoController extends Component
{
	
	use WithPagination;	

	public $customid,$numero,$juzgado,$email, $search, $selected_id, $pageTitle,$componentName;
	private $pagination = 5;

	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Catalogo Juzgados';		
	}

	public function render()
	{
		if(strlen($this->search) > 0)
			$data = JuzgadoCatalogo::where('numero', 'like', '%' . $this->search . '%')
					->orWhere('juzgado', 'like', '%' . $this->search . '%')
					->orWhere('customid', 'like', '%' . $this->search . '%')
						->paginate($this->pagination);
		else
			$data= JuzgadoCatalogo::orderBy('juzgado','asc')->paginate($this->pagination);

		return view('livewire.juzgadoscatalogo.component',[
			'data' => $data
		])
		->extends('layouts.theme.app')
		->section('content');
	}


	public function Store()
	{
		//validation rules
		$rules = [
			'customid' => 'required|unique:juzgados_catalogo|min:12|max:12',
			'juzgado' => 'required',
			'numero' => 'required',
			'email' => 'required|email'
		];
		

		//custom messages
		$customMessages = [
			'customid.required' => 'El ID único es requerido',
			'customid.unique' => 'El Id único ya está registrado',
			'customid.min' => 'El ID único debe tener mínimo 12 caracteres',
			'customid.max' => 'El ID único debe tener máximo 12 caracteres',
			'juzgado.required' => 'El nombre del juzgado es requerido',
			'numero.required' => 'El número de juzgado es requerido',
			'email.required' => 'El email es requerido',
			'email.email' => 'El email es inválido',
		];

		//execute validate
		$this->validate($rules, $customMessages);

		
		//insert
		$juzgado =  JuzgadoCatalogo::create([
			'customid' => $this->customid,
			'juzgado' => $this->juzgado,
			'numero' => $this->numero,
			'email' => $this->email,
		]);

		
		// clear inputs
		$this->resetUI();
		// emit frontend notification
		$this->emit('row-added', 'Juzgado Registrado');
	}

	public function Edit($id)
	{
		$record = JuzgadoCatalogo::find($id);				
		$this->selected_id = $record->id;
		$this->numero = $record->numero;		
		$this->juzgado = $record->juzgado;		
		$this->email = $record->email;		
		$this->customid = $record->customid;		
		
		$this->emit('show-modal','Show modal!');
	}

	public function Update()
	{ 		

		$rules = [
			'customid' => "required|min:3|unique:juzgados_catalogo,customid,{$this->selected_id}",			
			'juzgado' => 'required',
			'numero' => 'required',
			'email' => 'required|email'
		];		

		//custom messages
		$customMessages = [
			'customid.required' => 'El ID único es requerido',
			'customid.unique' => 'El Id único ya está registrado',
			'customid.min' => 'El ID único debe tener mínimo 12 caracteres',
			'customid.max' => 'El ID único debe tener máximo 12 caracteres',
			'juzgado.required' => 'El nombre del juzgado es requerido',
			'numero.required' => 'El número de juzgado es requerido',
			'email.required' => 'El email es requerido',
			'email.email' => 'El email es inválido',
		];


		//execute validate
		$this->validate($rules, $customMessages);


		//update
		$juzgado = JuzgadoCatalogo::find($this->selected_id);    
		$juzgado->update([
			'customid' => $this->customid,
			'juzgado' => $this->juzgado,
			'numero' => $this->numero,
			'email' => $this->email,
		]);  
		

		$this->resetUI();
		$this->emit('row-updated', 'Juzgado Actualizado');
	}

	// reset values inputs
	public function resetUI()
	{
		$this->customid ='';	
		$this->numero ='';	
		$this->juzgado ='';	
		$this->email ='';	
		$this->search ='';
		$this->selected_id = 0;
	}

	//events listeners
	protected $listeners = [
		'deleteRow'   => 'Destroy'		
	]; 

	public function Destroy($id)
	{
		if ($id) { 
			$juzgado = JuzgadoCatalogo::find($id);				
			
			$juzgado->delete();
			
			$this->resetUI();
			$this->emit('row-deleted', 'Juzgado Eliminado');
		}
	}

}
