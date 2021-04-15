<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Actuacion;
use App\Models\DecisionCatalogo;

class ActuacionesController extends Component
{
    use WithPagination;
	use WithFileUploads;

	public $anexo, $search, $selected_id, $pageTitle,$componentName;
	private $pagination = 3;

	public function mount()
	{
		$this->pageTitle = '';
		$this->componentName = 'Registro y Consulta de Actuaciones';		
	}

	public function render()
	{
		if(strlen($this->search) > 0)
			$data = Actuacion::where('anexo', 'like', '%' . $this->search . '%')->paginate($this->pagination);
		else
			$data= Actuacion::orderBy('anexo','asc')->paginate($this->pagination);

		return view('livewire.actuaciones.component',[
			'data' => $data,
			'decisiones' =>DecisionCatalogo::all()
		])
		->extends('layouts.theme.app')
		->section('content');
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
			$anexo = Actuacion::find($id);				
			
			$anexo->delete();
			
			$this->resetUI();
			$this->emit('anexo-deleted', 'Actuacion Eliminada');
		}
	}
}
