<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProcesoCatalogo;

class ProcesosCatalogoController extends Component
{
	
	use WithPagination;	

	public $proceso, $search, $selected_id, $pageTitle,$componentName;
	private $pagination = 5;

	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Catalogo Procesos';		
	}

	public function render()
	{
		if(strlen($this->search) > 0)
			$data = ProcesoCatalogo::where('proceso', 'like', '%' . $this->search . '%')->paginate($this->pagination);
		else
			$data= ProcesoCatalogo::orderBy('proceso','asc')->paginate($this->pagination);

		return view('livewire.procesoscatalogo.component',[
			'data' => $data
		])
		->extends('layouts.theme.app')
		->section('content');
	}


	public function Store()
	{
		//validation rules
		$rules = [
			'proceso' => 'required|unique:procesos_catalogo|min:3'
		];
		

		//custom messages
		$customMessages = [
			'proceso.required' => 'Nombre del proceso requerido',
			'proceso.unique' => 'Nombre del proceso ya registrado',
		];

		//execute validate
		$this->validate($rules, $customMessages);

		
		//insert
		$proceso =  ProcesoCatalogo::create([
			'proceso' => $this->proceso
		]);

		
		// clear inputs
		$this->resetUI();
		// emit frontend notification
		$this->emit('row-added', 'Proceso Registrado');
	}

	public function Edit($id)
	{
		$record = ProcesoCatalogo::find($id);				
		$this->selected_id = $record->id;
		$this->proceso = $record->proceso;		
		
		$this->emit('show-modal','Show modal!');
	}

	public function Update()
	{
 		//validation rules
		$rules = [
			'proceso' => "required|min:3|unique:procesos_catalogo,proceso,{$this->selected_id}"
		];
		

		//custom messages
		$customMessages = [
			'proceso.required' => 'Nombre del proceso es requerido',
			'proceso.unique' => 'Ya existe el nombre del proceso',
			'proceso.min' => 'El proceso debe tener al menos 3 caracteres',
		];

		//execute validate
		$this->validate($rules, $customMessages);


		//update
		$proceso = ProcesoCatalogo::find($this->selected_id);    
		$proceso->update([
			'proceso' => $this->proceso
		]);  
		

		$this->resetUI();
		$this->emit('row-updated', 'Proceso Actualizado');
	}

	// reset values inputs
	public function resetUI()
	{
		$this->proceso ='';	
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
			$proceso = ProcesoCatalogo::find($id);				
			
			$proceso->delete();
			
			$this->resetUI();
			$this->emit('row-deleted', 'Proceso Eliminado');
		}
	}

}
