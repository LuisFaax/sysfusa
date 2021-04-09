<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Radicado;

class RadicacionesController extends Component
{
	use WithPagination;
	use WithFileUploads;

	public $radicado, $search, $selected_id, $pageTitle,$componentName;
	private $pagination = 3;

	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Recepción y Radicación de Demandas';		
	}

	public function render()
	{
		if(strlen($this->search) > 0)
			$data = Radicado::where('radicado', 'like', '%' . $this->search . '%')->paginate($this->pagination);
		else
			$data= Radicado::orderBy('radicado','asc')->paginate($this->pagination);

		return view('livewire.radicaciones.component',[
			'data' => $data
		])
		->extends('layouts.theme.app')
		->section('content');
	}






	// reset values inputs
	public function resetUI()
	{
		$this->radicado ='';	
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
			$radicado = Radicado::find($id);				
			
			$radicado->delete();
			
			$this->resetUI();
			$this->emit('radicado-deleted', 'Radicado Eliminado');
		}
	}
}
