<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\DecisionCatalogo;

class DecisionesCatalogoController extends Component
{
	
	use WithPagination;	

	public $decision, $search, $selected_id, $pageTitle,$componentName;
	private $pagination = 5;

	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Catalogo Decisiones';		
	}

	public function render()
	{
		if(strlen($this->search) > 0)
			$data = DecisionCatalogo::where('decision', 'like', '%' . $this->search . '%')->paginate($this->pagination);
		else
			$data= DecisionCatalogo::orderBy('decision','asc')->paginate($this->pagination);

		return view('livewire.decisionescatalogo.component',[
			'data' => $data
		])
		->extends('layouts.theme.app')
		->section('content');
	}


	public function Store()
	{
		//validation rules
		$rules = [
			'decision' => 'required|unique:decisiones_catalogo|min:3'
		];
		

		//custom messages
		$customMessages = [
			'decision.required' => 'Nombre de la decisión requerido',
			'decision.unique' => 'Nombre de la decisión ya registrado',
		];

		//execute validate
		$this->validate($rules, $customMessages);

		
		//insert
		$decision =  DecisionCatalogo::create([
			'decision' => $this->decision
		]);

		
		// clear inputs
		$this->resetUI();
		// emit frontend notification
		$this->emit('row-added', 'Anexo Registrado');
	}

	public function Edit($id)
	{
		$record = DecisionCatalogo::find($id);				
		$this->selected_id = $record->id;
		$this->decision = $record->decision;		
		
		$this->emit('show-modal','Show modal!');
	}

	public function Update()
	{
 		//validation rules
		$rules = [
			'decision' => "required|min:3|unique:decisiones_catalogo,decision,{$this->selected_id}"
		];
		

		//custom messages
		$customMessages = [
			'decision.required' => 'Nombre de la decisión es requerido',
			'decision.unique' => 'Ya existe el decisión',
			'decision.min' => 'El nombre debe tener al menos 3 caracteres',
		];

		//execute validate
		$this->validate($rules, $customMessages);


		//update
		$decision = DecisionCatalogo::find($this->selected_id);    
		$decision->update([
			'decision' => $this->decision
		]);  
		

		$this->resetUI();
		$this->emit('row-updated', 'Decisión Actualizada');
	}

	// reset values inputs
	public function resetUI()
	{
		$this->decision ='';	
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
			$decision = DecisionCatalogo::find($id);				
			
			$decision->delete();
			
			$this->resetUI();
			$this->emit('row-deleted', 'Decisión Eliminada');
		}
	}

}
