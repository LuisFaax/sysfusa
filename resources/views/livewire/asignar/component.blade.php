<div>
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b class='h3 font-weight-bold'>{{$componentName}}</b> </h4>
                    
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                    <div class="heading-elements">

                    </div>

                </div>
                <div class="card-content">
                    <div class="card-body">                     
                       <div class="row">
                        <div class="col-sm-12">
                           <form class="form-inline">                   

                            <div class="form-group mr-5">                    
                                <select wire:model="selected_id" class="form-control">
                                    <option value="Seleccionar" selected>Seleccionar</option>                     
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{ $role->name }}</option>
                                    @endforeach
                                </select> 
                            </div>                      

                            
                            @can('asignaciones_syncalll')
                            <button wire:click.prevent="SyncAll()" 
                            class="btn btn-dark mr-5 mbmobile inblock" 
                            type="button" {{$selected_id == 'Seleccionar' ? 'disabled' : ''}} >
                            Sincronizar Todos
                        </button>
                        @endcan

                        @can('asignaciones_revokeall')
                        <button onclick="Revocar()" 
                        class="btn btn-dark" 
                        type="button" {{$selected_id == "Seleccionar" ? "disabled" : ""}}>
                        Revocar Todos
                    </button>
                    @endcan


                </form>
                @error('selected_id') <span class="text-danger er">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="table-responsive">
            <table  class="table table-hover table-xl mb-0 table-de mt-1">
                <thead class="bg-dark text-white">
                    <tr>
                        <th class="table-th text-left text-white">ID</th>                                     
                        <th class="table-th text-center text-white">PERMISO</th>
                        <th class="table-th text-center text-white">ROLES CON EL PERMISO</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($permisos as $permiso)
                    <tr>
                        <td><h6 class="text-left">{{$permiso->id}}</h6></td>  
                        <td class="text-center">

                            <div class="n-chk">
                                <label class="new-control new-checkbox checkbox-primary">
                                    @can('asignaciones_syncone')
                                    <input  
                                    wire:change="SyncPermiso($('#p'+ {{$permiso->id}}).is(':checked'), '{{ $permiso->name}}')"
                                    id="p{{ $permiso->id }}"
                                    type="checkbox"
                                    value ="{{$permiso->id}}"
                                    class="new-control-input"                                               
                                    {{ $permiso->checked == 1 ? 'checked' : '' }}
                                    >
                                    @endcan
                                    <span class="new-control-indicator">
                                    </span><h6>{{ strtoupper($permiso->name) }}</h6>  
                                </label>
                            </div>

                        </td>   

                        <td class="text-center">
                            <h6>{{\App\Models\User::permission($permiso->name)->count()}}</h6>
                        </td>                                   


                    </tr>

                    @endforeach
                </tbody>
            </table>
            {{$permisos->links()}}
        </div>
    </div>
</div>

</div>
</div>
</section>

</div>





<script>
    document.addEventListener('DOMContentLoaded', function () {  

        window.livewire.on('asignar-added', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })      
        window.livewire.on('category-updated', Msg => {
            $('#theModal').modal('hide')
            noty(Msg)
        })      
        window.livewire.on('category-deleted', Msg => {         
            noty(Msg)
        })
        window.livewire.on('permi', Msg => {            
            noty(Msg)
        })
        window.livewire.on('syncall', Msg => {          
            noty(Msg)
        })
        window.livewire.on('removeall', Msg => {            
            noty(Msg)
        })
        window.livewire.on('hide-modal', Msg => {
            $('#theModal').modal('hide')          
        })
        window.livewire.on('show-modal', Msg => {
            $('#theModal').modal('show')          
        })
        $('#theModal').on('hidden.bs.modal', function (e) {         
            $('.er').css('display','none')
        })




    })


    function Confirm(id)
    {       
        swal({
            title: 'CONFIRMAR',
            text: '¿DESEAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cerrar',         
        }).then(function(result) {
            if (result.value) {                     
                window.livewire.emit('deleteRow', id)                       
                swal.close()  
            }
        })

    }
    function Revocar()
    {       var rol = '{{ $role }}'
    console.log(rol)
    swal({
        title: 'CONFIRMAR',
        text: '¿CONFIRMAS REVOCAR TODOS LOS PERMISOS?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cerrar',         
    }).then(function(result) {
        if (result.value) {                     
            window.livewire.emit('revokeall')                       
            swal.close()  
        }
    })

}
</script>