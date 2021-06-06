<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EntidadCatalogo;

class EntidadesCatalogoController extends Component
{
	
	use WithPagination;	

	public $decision,$codigo, $search, $selected_id, $pageTitle,$componentName;
	private $pagination = 5;

	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Catalogo Entidades';		
	}

	public function render()
	{
		if(strlen($this->search) > 0)
			$data = EntidadCatalogo::where('decision', 'like', '%' . $this->search . '%')
					->orWhere('codigo', 'like', '%' . $this->search . '%')
						->paginate($this->pagination);
		else
			$data= EntidadCatalogo::orderBy('decision','asc')->paginate($this->pagination);

		return view('livewire.entidadescatalogo.component',[
			'data' => $data
		])
		->extends('layouts.theme.app')
		->section('content');
	}


	public function Store()
	{
		//validation rules
		$rules = [
			'decision' => 'required|unique:entidades_catalogo|min:3',
			'codigo' => 'required'
		];
		

		//custom messages
		$customMessages = [
			'decision.required' => 'El nombre de la decisión es requerido',
			'decision.unique' => 'El nombre del decisión ya está registrado',
			'decision.min' => 'El nombre de la decisión debe tener al menos 3 caracteres',
			'codigo.required' => 'El código es requerido'
		];

		//execute validate
		$this->validate($rules, $customMessages);

		
		//insert
		$entidad =  EntidadCatalogo::create([
			'decision' => $this->decision,
			'codigo' => $this->codigo
		]);

		
		// clear inputs
		$this->resetUI();
		// emit frontend notification
		$this->emit('row-added', 'Entidad Registrada');
	}

	public function Edit($id)
	{
		$record = EntidadCatalogo::find($id);				
		$this->selected_id = $record->id;
		$this->decision = $record->decision;		
		$this->codigo = $record->codigo;		
		
		$this->emit('show-modal','Show modal!');
	}

	public function Update()
	{
 		//validation rules		
		$rules = [
			'decision' => "required|min:3|unique:entidades_catalogo,decision,{$this->selected_id}",
			'codigo' => 'required'
		];
		

		//custom messages
		$customMessages = [
			'decision.required' => 'El nombre de la decisión es requerido',
			'decision.unique' => 'El nombre del decisión ya está registrado',
			'decision.min' => 'El nombre de la decisión debe tener al menos 3 caracteres',
			'codigo.required' => 'El código es requerido'
		];

		//execute validate
		$this->validate($rules, $customMessages);


		//update
		$entidad = EntidadCatalogo::find($this->selected_id);    
		$entidad->update([
			'decision' => $this->decision,
			'codigo' => $this->codigo
		]);  
		

		$this->resetUI();
		$this->emit('row-updated', 'Entidad Actualizada');
	}

	// reset values inputs
	public function resetUI()
	{
		$this->decision ='';	
		$this->codigo ='';	
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
			$entidad = EntidadCatalogo::find($id);				
			
			$entidad->delete();
			
			$this->resetUI();
			$this->emit('row-deleted', 'Entidad Eliminada');
		}
	}

}
