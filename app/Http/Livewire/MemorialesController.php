<?php

namespace App\Http\Livewire;

use App\Models\Actuacion;
use App\Models\Radicado;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MemorialesController extends Component
{
   	use WithPagination;
	use WithFileUploads;

	public $comentario, $archivo, $search, $selected_id, $pageTitle,$componentName, $info, $numero;
	private $pagination = 3;

	public function mount()
	{
		$this->pageTitle = '';
		$this->componentName = 'Radicación de Memoriales';		
	}

	public function render()
	{
		$data =[];
		if(strlen($this->search) > 0) {
			//dd($this->search);

			$data = Actuacion::join('radicados as r','r.id','actuaciones.radicado_id')
			->join('decisiones_catalogo as dc','dc.id','actuaciones.actuacion_id')
			->where('r.cup', 'like', '%'. $this->search . '%')
			->orWhere('r.numero', 'like', '%'. $this->search . '%')
			->orWhere('r.descripcion', 'like', '%'. $this->search . '%')
			->orWhere('r.folios', 'like', '%'. $this->search . '%')
			->orWhere('r.cuaderno', 'like', '%'. $this->search . '%')
			->orWhere('dc.decision', 'like', '%'. $this->search . '%')
			->select('actuaciones.*','r.id as radicado_id')
			->paginate(5);
		}
		return view('livewire.memoriales.component',[
			'data' => $data
		])
		->extends('layouts.theme.app')
		->section('content');
	}




	public function getMemorial(Radicado $radicado)
	{		
		
		$this->info = $radicado;
		$this->numero = ($radicado->numero !=null ? $radicado->numero : $radicado->cup);
		$this->search = '';

	}

	public function Store()
	{
		$rules = [
			'comentario' => 'max:1000',
			'archivo' => 'required'			
		];	
		$messages = [			
			'comentario.max' => 'El comentario debe tener máximo 1000 caracteres',
			'archivo.required' => 'El archivo es requerido'
		];
		
		$this->validate($rules, $messages);

		$memorial = Memorial::create([
			'numero' => $this->numero,
			'comentario' => $this->comentario,
			'archivo' => $this->archivo,
			'user_id' => Auth()->user()->id,
			'radicado_id' => $this->selected_id
		]);
	}


}
