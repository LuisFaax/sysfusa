<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Actuacion;

class HistorialesController extends Component
{
	use WithPagination;
	use WithFileUploads;

	public $anexo, $search, $selected_id, $pageTitle,$componentName, $info;
	private $pagination = 3;

	public function mount()
	{
		$this->pageTitle = '';
		$this->componentName = 'Consultar Historial de Actuaciones';	
		$this->info =[];	
		$this->data =[];	
	}

	public function render()
	{
		$actuaciones =[];
		$data =[];
		

		if(strlen($this->search) > 0) {
			$data = Actuacion::join('radicados as r','r.id','actuaciones.radicado_id')
			->join('decisiones_catalogo as dc','dc.id','actuaciones.actuacion_id')
			->where('r.cup', 'like', '%'. $this->search . '%')
			->orWhere('r.numero', 'like', '%'. $this->search . '%')
			->orWhere('r.descripcion', 'like', '%'. $this->search . '%')
			->orWhere('r.folios', 'like', '%'. $this->search . '%')
			->orWhere('r.cuaderno', 'like', '%'. $this->search . '%')
			->orWhere('dc.decision', 'like', '%'. $this->search . '%')
			->select('actuaciones.*')
			->paginate(5);
		}

		return view('livewire.historiales.component',[
			'data' => $data
		])
		->extends('layouts.theme.app')
		->section('content');
	}

	public function getRadicado($id)
	{
		//dd($id);
		$data = Actuacion::join('radicados as r','r.id','actuaciones.radicado_id')
		->join('decisiones_catalogo as dc','dc.id','actuaciones.actuacion_id')
		->where('actuaciones.id', $id)							
		->select('actuaciones.*')
		->get();
		$this->info = $data;
		$this->search = '';

	}






	
}
