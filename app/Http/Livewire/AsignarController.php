<?php

namespace App\Http\Livewire;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Livewire\Component;
use DB;

class AsignarController extends Component
{
    use WithPagination;

    public $role,$selected_id, $componentName, $permisosSelected = [], $old_permissions=[];
    private $pagination = 10;

    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->selected_id = 'Seleccionar';
        $this->componentName = 'Asignar Permisos';              
    }


    public function render()
    {
        $permisos = Permission::select('name','id',DB::raw("0 as checked") )        
        ->orderBy('name','asc')
        ->paginate($this->pagination);
        //dd($permisos);
        
        if($this->role !='Seleccionar'){
            $list = Permission::join('role_has_permissions as rp','rp.permission_id','permissions.id')
            ->where('role_id', $this->selected_id)->pluck('permissions.id')->toArray();
            
            $this->old_permissions = $list; 
            
        }

        if($this->selected_id != 'Seleccionar')
        {
            foreach ($permisos as $permiso) {
                $role = Role::find($this->selected_id);                
                $tienePermiso = $role->hasPermissionTo($permiso->name);
                if($tienePermiso){
                    $permiso->checked = 1;
                }
            }
        }
        
        return view('livewire.asignar.component',[
            'roles'    => Role::orderBy('name','asc')->get(),
            'permisos' => $permisos

        ])
        ->extends('layouts.theme.app')
        ->section('content');

    }
    

    public $listeners = [
        'revokeall' => 'RemoveAll'
    ];

    public function RemoveAll()
    {
        $rules = ['selected_id' => 'required|not_in:Seleccionar'];
        $messages =[
            'selected_id.required' => 'Selecciona el role',
            'selected_id.not_in' => 'Elige un role de la lista'
        ];
        $this->validate($rules, $messages);


        $role = Role::find($this->selected_id);        

        $role->syncPermissions([0]);    
        $this->emit('removeall', "Se revocaron todos los permisos al role $role->name ");
    }

    public function SyncAll()
    {
        $rules = ['selected_id' => 'required|not_in:Seleccionar'];
        $messages =[
            'selected_id.required' => 'Selecciona el role',
            'selected_id.not_in' => 'Elige un role de la lista'
        ];
        $this->validate($rules, $messages);

        $role = Role::find($this->selected_id);
        $permisos  = Permission::pluck('id')->toArray();

        $role->syncPermissions($permisos);  
        $this->emit('syncall', "Se sincronizaron todos los permisos al role $role->name ");
    }

    public function SyncPermiso($state, $permisoName)
    {
        if($this->selected_id !='Seleccionar')
        {

            $roleName = Role::find($this->selected_id);

            if($state)
            {
                $roleName->givePermissionTo($permisoName);
                $this->emit('permi', 'Permisos asignado correctamente');
            } else {
                $roleName->revokePermissionTo($permisoName);
                $this->emit('permi', 'Permisos eliminado correctamente');
            }
        }
    }


}
