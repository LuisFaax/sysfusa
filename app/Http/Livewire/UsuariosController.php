<?php

namespace App\Http\Livewire;

use App\Models\Radicado;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UsuariosController extends Component
{	
	use WithPagination;
	use WithFileUploads;


	public $name,$phone,$email,$profile,$image,$password, $selected_id, $fileLoaded, $role;
	public $pageTitle, $componentName, $search;	
	private $pagination = 3;

	
	public function paginationView()
	{
		return 'vendor.livewire.bootstrap';
	}
	
	public function mount()
	{
		$this->pageTitle = 'Listado';
		$this->componentName = 'Usuarios';	
		$this->role = 'Elegir';
	}

	
	public function render()
	{	

		if(strlen($this->search) > 0)
			$data = User::where('name', 'like', '%' . $this->search .'%')				
		->select('*')
		->orderBy('name','asc')->paginate($this->pagination);
		else
			$data = User::select('*')				
		->orderBy('name','asc')->paginate($this->pagination);



		return view('livewire.usuarios.component',[
			'data' => $data,
			'roles' => Role::orderBy('name','asc')->get()
		])
		->extends('layouts.theme.app')
		->section('content');
	}

	
	//resetUI
	public function resetUI()
	{
		$this->name ='';
		$this->email ='';
		$this->password ='';
		$this->phone ='';
		$this->image ='';
		$this->role ='Elegir';	
		$this->search ='';
		$this->selected_id = 0;			
	}

	//edit
	public function Edit($id)
	{
		$record = User::find($id);				
		$this->selected_id = $record->id;
		$this->name = $record->name;
		$this->phone = $record->phone;
		$this->role = $record->role;
		$this->email = $record->email;
		$this->password ='';

		$this->emit('show-modal','open!');
	}



	//events listeners
	protected $listeners = [
		'deleteRow'   => 'destroy',
		'resetUI' =>'resetUI',	
	];  
	

	//create method
	public function Store()
	{
		//validate
		$rules =[
			'name' => 'required|min:3',
			'email' => 'required|unique:users|email',
			'role' => 'required|not_in:Elegir',
			'password' => 'required|min:3'
		];

		$messages = [
			'name.required' => 'Ingresa el nombre',
			'name.min' => 'El nombre de usuario debe tener al menos 3 caracteres',
			'email.required' => 'Ingresa el correo electrónico',
			'email.unique' => 'El correo ya está registrado en sistema',
			'email.email' => 'El email es inválido',
			'role.required' => 'Selecciona el role para el usuario',
			'password.required' => 'Ingresa la contraseña',
			'password.min' => 'La contraseña debe tener al menos 3 caracteres',
			'role.not_in' => 'Elige el role'
		];


		$this->validate($rules, $messages);
		
		//insert user
		$user =  User::create([
			'name' => $this->name,
			'email' => $this->email,			
			'phone' => $this->phone,
			'role' => $this->role,
			'password' => bcrypt($this->password)
		]);

		// asign role
		$user->assignRole($this->role);


		//save image		
		if($this->image)
		{
			$customFileName	 = uniqid() . '_.' . $this->image->extension();	
			$this->image->storeAs('public/users', $customFileName);
			$user->image = $customFileName;
			$user->save();
		}

		$this->resetUI();
		$this->emit('user-added', 'Usuario Registrado Correctamente');

	}

	//update method
	public function Update()
	{			
		$rules =[
			'email' => "required|email|unique:users,email,{$this->selected_id}",
			'role' => 'required|not_in:Elegir',
			'name' => 'required|min:3',
			'password' => 'required|min:3'
		];

		$messages = [
			'name.required' => 'Ingresa el nombre',
			'name.min' => 'El nombre de usuario debe tener al menos 3 caracteres',
			'email.required' => 'Ingresa el correo electrónico',
			'email.unique' => 'El correo ya está registrado en sistema',
			'email.email' => 'El email es inválido',
			'role.required' => 'Selecciona el role para el usuario',
			'password.required' => 'Ingresa la contraseña',
			'password.min' => 'La contraseña debe tener al menos 3 caracteres',
			'role.not_in' => 'Elige el role'
		];

		$this->validate($rules, $messages);

		//update
		$user = User::find($this->selected_id);    
		$user->update([
			'name' => $this->name,
			'email' => $this->email,			
			'phone' => $this->phone,	
			'role' => $this->role,
			'password' => bcrypt($this->password)		
		]);  

		// sincronizar roles
		$user->syncRoles([$this->role]);


		//save image
		if($this->image)
		{
			$customFileName	 = uniqid() . '_.' . $this->image->extension();	
			$this->image->storeAs('public/users', $customFileName);
			$imageName = $user->image;			

			$user->image = $customFileName;
			$user->save();

			if($imageName !=null)  {
				if (file_exists('storage/users/'. $imageName)) {
					unlink('storage/users/'. $imageName);	
				}
			}	
		}

		$this->resetUI();
		$this->emit('user-updated', 'Usuario Actualizado Correctamente');
	}


	//destroy
	public function destroy(User $user)
	{		
		if ($user) { 	
			$radicados = Radicado::where('user_id', $user->id)->count();
			if($radicados > 0) {
				$this->emit('user-withradicados', 'No es posible eliminar el usuario porque tiene radicaciones relacionadas');	
			} else {
				$user->delete();
				$this->resetUI();
				$this->emit('user-deleted', 'Usuario Eliminado');		
			}	
		}

	}




}
