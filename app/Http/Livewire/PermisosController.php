<?php

namespace App\Http\Livewire;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;
use DB;

class PermisosController extends Component
{
	use WithPagination;

	public $permissionName, $search,  $selected_id, $pageTitle,$componentName;
	private $pagination = 10;

	public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Permisos';		
	
		//$c = User::permission('radicar_buscar')->count();
		//dd($c);
	}

	public function resetUI()
	{
		$this->permissionName ='';
		$this->search ='';
		$this->selected_id = 0;
	}

	public function render()
	{
		if(strlen($this->search) > 0)
			$permisos = Permission::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
		else
			$permisos = Permission::orderBy('name','asc')->paginate($this->pagination);

		return view('livewire.permisos.component', [
			'permisos' => $permisos
		])
		->extends('layouts.theme.app')
		->section('content');
	}


	public function CreatePermission()
	{
		$rules = [
			'permissionName' => 'required|min:2|unique:permissions,name'
		];	
		
		$customMessages = [
			'permissionName.required' => 'El nombre del permiso es requerido',
			'permissionName.unique' => 'Ya existe el permiso en sistema',
			'permissionName.min' => 'El nombre del permiso debe tener al menos 2 caracteres',
		];
		
		$this->validate($rules, $customMessages);
		

		Permission::create([
			'name' => $this->permissionName
		]);

		$this->emit('permiso-added', 'Se registró el permiso correctamente');
		$this->resetUI();	

	}


	public function Edit($id)
	{
		$permiso = Permission::find($id);				
		$this->selected_id = $permiso->id;
		$this->permissionName = $permiso->name;		
		
		$this->emit('show-modal','Show modal!');
	}


	public function UpdatePermission()
	{    	
		$rules = [
			'permissionName' => "required|min:2|unique:permissions,name,{$this->selected_id}"
		];
		$customMessages = [
			'permissionName.required' => 'El nombre del permiso es requerido',
			'permissionName.unique' => 'Ya existe el permiso en sistema',
			'permissionName.min' => 'El nombre del permiso debe tener al menos 2 caracteres',
		];
		
		$this->validate($rules, $customMessages);


		$permiso = Permission::find($this->selected_id);
		$permiso->name = $this->permissionName;
		$permiso->save();
		$this->emit('permiso-updated', 'Se actualizó el permiso correctamente');
		$this->resetUI();    	
	}

	protected $listeners = [
		'destroy'   => 'Destroy'		
	];  


	public function Destroy($id)
	{	  	
		$permissions = Permission::find($id);
		$count =0;
		if($permissions)
		{
			$count = $permissions->getRoleNames()->count();			
		}
		if($count > 0)
		{
			$this->emit('permiso-error', 'No se puede eliminar el permiso porque tiene roles asociados');
			return;
		}

		Permission::find($id)->delete();
		$this->emit('permiso-deleted', 'Se eliminó el permiso correctamente');
	}


	


}
