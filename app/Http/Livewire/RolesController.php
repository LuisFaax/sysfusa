<?php

namespace App\Http\Livewire;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;
use DB;

class RolesController extends Component
{
	use WithPagination;

	public $roleName, $search,  $selected_id, $pageTitle,$componentName;
	private $pagination = 5;

	public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}

	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Roles';			
	}

	public function resetUI()
	{
		$this->roleName ='';
		$this->search ='';
		$this->selected_id = 0;
	}

	public function render()
	{
		if(strlen($this->search) > 0)
			$roles = Role::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
		else
			$roles = Role::orderBy('name','asc')->paginate($this->pagination);

		return view('livewire.roles.component', [
			'roles' => $roles
		])
		->extends('layouts.theme.app')
		->section('content');
	}


	public function CreateRole()
	{
		$rules = [
			'roleName' => 'required|min:2|unique:roles,name'
		];	
		
		$customMessages = [
			'roleName.required' => 'El nombre del role es requerido',
			'roleName.unique' => 'Ya existe el role en sistema',
			'roleName.min' => 'El nombre del role debe tener al menos 2 caracteres',
		];
		
		$this->validate($rules, $customMessages);
		

		Role::create([
			'name' => $this->roleName
		]);

		$this->emit('role-added', 'Se registró el role correctamente');
		$this->resetUI();	

	}


	public function Edit($id)
	{
		$role = Role::find($id);				
		$this->selected_id = $role->id;
		$this->roleName = $role->name;		
		
		$this->emit('show-modal','Show modal!');
	}


	public function UpdateRole()
	{    	
		$rules = [
			'roleName' => "required|min:2|unique:roles,name,{$this->selected_id}"
		];
		$customMessages = [
			'roleName.required' => 'El nombre del role es requerido',
			'roleName.unique' => 'Ya existe el role en sistema',
			'roleName.min' => 'El nombre del role debe tener al menos 2 caracteres',
		];
		
		$this->validate($rules, $customMessages);


		$role = Role::find($this->selected_id);
		$role->name = $this->roleName;
		$role->save();
		$this->emit('role-updated', 'Se actualizó el role correctamente');
		$this->resetUI();    	
	}

	protected $listeners = [
		'destroy'   => 'Destroy'		
	];  


	public function Destroy($id)
	{	  	
		$permissionsCount = Role::find($id)->permissions->count();
		if($permissionsCount > 0)
		{
			$this->emit('role-error', 'No se puede eliminar el role porque tiene permisos asociados');
			return;
		}

		Role::find($id)->delete();
		$this->emit('role-deleted', 'Se eliminó el role correctamente');
	}


	public function AsignarRoles($rolesList)
	{			
		if($this->userSelected > 0 ){
			$user = User::find($this->userSelected);	

			if($user) {						
				$user->syncRoles($rolesList);				
				$this->emit('msg-ok', 'Roles asignados correctamente');
				$this->resetInput();  
			}
		}
	}


}
