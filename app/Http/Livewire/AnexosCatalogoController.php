<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\AnexoCatalogo;

class AnexosCatalogoController extends Component
{
	
	use WithPagination;
	use WithFileUploads;

	public $anexo, $search, $selected_id, $pageTitle,$componentName;
	private $pagination = 3;

	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Catalogo Anexos';		
	}

	public function render()
	{
		if(strlen($this->search) > 0)
			$data = AnexoCatalogo::where('anexo', 'like', '%' . $this->search . '%')->paginate($this->pagination);
		else
			$data= AnexoCatalogo::orderBy('anexo','asc')->paginate($this->pagination);

		return view('livewire.anexoscatalogo.component',[
			'data' => $data
		])
		->extends('layouts.theme.app')
		->section('content');
	}


	public function Store()
	{
		//validation rules
		$rules = [
			'anexo' => 'required|unique:anexos_catalogo|min:3'
		];
		

		//custom messages
		$customMessages = [
			'anexo.required' => 'Nombre del anexo requerido',
			'anexo.unique' => 'Nombre del anexo ya registrado',
		];

		//execute validate
		$this->validate($rules, $customMessages);

		
		//insert
		$anexo =  AnexoCatalogo::create([
			'anexo' => $this->anexo
		]);

		
		// clear inputs
		$this->resetUI();
		// emit frontend notification
		$this->emit('anexo-added', 'Anexo Registrado');
	}

	public function Edit($id)
	{
		$record = AnexoCatalogo::find($id);				
		$this->selected_id = $record->id;
		$this->anexo = $record->anexo;		
		
		$this->emit('show-modal','Show modal!');
	}

	public function Update()
	{
 		//validation rules
		$rules = [
			'anexo' => "required|min:3|unique:anexos_catalogo,anexo,{$this->selected_id}"
		];
		

		//custom messages
		$customMessages = [
			'anexo.required' => 'Nombre del anexo requerido',
			'anexo.unique' => 'Ya existe el anexo',
			'anexo.min' => 'El nombre debe tener al menos 3 caracteres',
		];

		//execute validate
		$this->validate($rules, $customMessages);


		//update
		$anexo = AnexoCatalogo::find($this->selected_id);    
		$anexo->update([
			'anexo' => $this->anexo
		]);  
		

		$this->resetUI();
		$this->emit('anexo-updated', 'Anexo Actualizado');
	}

	// reset values inputs
	public function resetUI()
	{
		$this->anexo ='';	
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
			$anexo = AnexoCatalogo::find($id);				
			
			$anexo->delete();
			
			$this->resetUI();
			$this->emit('anexo-deleted', 'Anexo Eliminado');
		}
	}

}
