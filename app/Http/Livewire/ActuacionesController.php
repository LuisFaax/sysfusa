<?php

namespace App\Http\Livewire;

use App\Models\Actuacion;
use App\Models\DecisionCatalogo;
use App\Models\Radicado;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ActuacionesController extends Component
{
	use WithPagination;
	use WithFileUploads;

	public $fecha,$sentencia,$sustancia,$interlocutor,$descripcion,$archivo,$actuacionid, $search, $selected_id, $pageTitle,$componentName,$radicadoId;
	
	private $pagination = 3;

	public function mount()
	{
		$this->pageTitle = '';
		$this->componentName = 'Registro y Consulta de Actuaciones';

	}

	public function render()
	{
		$actuaciones =[];
		$data =[];

		if(strlen($this->search) > 0) {
			$data = Radicado::where('cup',  $this->search )

			->orWhere('numero', $this->search )
			->get();

			if($data->count() > 0)
			{
				$this->radicadoId = $data[0]->id;
				$actuaciones = Actuacion::join('radicados as r','r.id','actuaciones.radicado_id')
							->join('decisiones_catalogo as dc','dc.id','actuaciones.actuacion_id')
							->where('r.cup', 'like', '%'. $this->search . '%')
							->orWhere('r.numero', 'like', '%'. $this->search . '%')
							->orWhere('r.descripcion', 'like', '%'. $this->search . '%')
							->orWhere('r.folios', 'like', '%'. $this->search . '%')
							->orWhere('r.cuaderno', 'like', '%'. $this->search . '%')
							->orWhere('dc.decision', 'like', '%'. $this->search . '%')
							->select('actuaciones.*')
							->get();

			} else {
				$data=[];
				$this->radicadoId =0;
			}
		} 
		else {
			$data=[];
			$this->radicadoId =0;
		}

		return view('livewire.actuaciones.component',[
			'data' => $data,
			'decisiones' =>DecisionCatalogo::all(),
			'actuaciones' => $actuaciones
		])
		->extends('layouts.theme.app')
		->section('content');
	}

	public function Store()
	{

		$actuacion = Actuacion::create([
			'radicado_id' =>$this->radicadoId,
			'fecha_registro' =>$this->fecha,
			'sustancia' =>'',
			'interlocutor' =>'0',
			'sentencia' =>'',
			'descripcion' =>$this->descripcion,
			'actuacion_id' =>$this->actuacionid
		]);

		if($this->archivo){
			$customFileName	 =  uniqid() . '_.' . $this->archivo->extension();	
			$this->archivo->storeAs('public/atachments/actuaciones/', $customFileName);
			$actuacion->archivo = $customFileName;
			$actuacion->save();
		}
		$this->resetUI();
		$this->emit('actuacion-added', 'Actuación registrada con éxito');

	}




	// reset values inputs
	public function resetUI()
	{
		$this->fecha ='';	
		$this->descripcion ='';	
		$this->archivo ='';	
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
