<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DepartamentoCatalogo;

class DepartamentosCatalogoController extends Component
{
	
	use WithPagination;	

	public $municipio,$codigo, $search, $selected_id, $pageTitle,$componentName;
	private $pagination = 5;

	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Catalogo Departamentos';		
	}

	public function render()
	{
		if(strlen($this->search) > 0)
			$data = DepartamentoCatalogo::where('municipio', 'like', '%' . $this->search . '%')
					->orWhere('codigo', 'like', '%' . $this->search . '%')
						->paginate($this->pagination);
		else
			$data= DepartamentoCatalogo::orderBy('municipio','asc')->paginate($this->pagination);

		return view('livewire.departamentoscatalogo.component',[
			'data' => $data
		])
		->extends('layouts.theme.app')
		->section('content');
	}


	public function Store()
	{
		//validation rules
		$rules = [
			'municipio' => 'required|unique:departamentos_catalogo|min:3',
			'codigo' => 'required'
		];
		

		//custom messages
		$customMessages = [
			'municipio.required' => 'El nombre del municipio es requerido',
			'municipio.unique' => 'El nombre del municipio ya está registrado',
			'municipio.min' => 'El nombre del municipio debe tener al menos 3 caracteres',
			'codigo.required' => 'El código es requerido'
		];

		//execute validate
		$this->validate($rules, $customMessages);

		
		//insert
		$depto =  DepartamentoCatalogo::create([
			'municipio' => $this->municipio,
			'codigo' => $this->codigo
		]);

		
		// clear inputs
		$this->resetUI();
		// emit frontend notification
		$this->emit('row-added', 'Departamento Registrado');
	}

	public function Edit($id)
	{
		$record = DepartamentoCatalogo::find($id);				
		$this->selected_id = $record->id;
		$this->municipio = $record->municipio;		
		$this->codigo = $record->codigo;		
		
		$this->emit('show-modal','Show modal!');
	}

	public function Update()
	{
 		//validation rules		
		$rules = [
			'municipio' => "required|min:3|unique:departamentos_catalogo,municipio,{$this->selected_id}",
			'codigo' => 'required'
		];
		

		//custom messages
		$customMessages = [
			'municipio.required' => 'El nombre del municipio es requerido',
			'municipio.unique' => 'El nombre del municipio ya está registrado',
			'municipio.min' => 'El nombre del municipio debe tener al menos 3 caracteres',
			'codigo.required' => 'El código es requerido'
		];

		//execute validate
		$this->validate($rules, $customMessages);


		//update
		$depto = DepartamentoCatalogo::find($this->selected_id);    
		$depto->update([
			'municipio' => $this->municipio,
			'codigo' => $this->codigo
		]);  
		

		$this->resetUI();
		$this->emit('row-updated', 'Departamento Actualizado');
	}

	// reset values inputs
	public function resetUI()
	{
		$this->municipio ='';	
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
			$depto = DepartamentoCatalogo::find($id);				
			
			$depto->delete();
			
			$this->resetUI();
			$this->emit('row-deleted', 'Departamento Eliminado');
		}
	}

}
