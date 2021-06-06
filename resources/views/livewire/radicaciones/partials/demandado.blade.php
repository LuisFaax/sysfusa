<h4 class="text-center text-info col-sm-12"><b> DATOS DE LA PERSONA </b></h4>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Nombre</label>
    <div class="position-relative has-icon-left">
      <input type="text" wire:model.lazy="name" class="form-control" placeholder="nombre completo" >
      <div class="form-control-position">
        <i class="ft-user"></i>
      </div>
    </div>
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Identificación</label>
    <div class="position-relative has-icon-left">
      <input type="text" wire:model.lazy="identification" class="form-control" placeholder="nombre completo" >
      <div class="form-control-position">
        <i class="ft-user"></i>
      </div>
    </div>
    @error('identification') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Tipo de Identificación</label>         
    <select wire:model='typeIdentification' class="form-control">
      <option value="Elegir" selected disabled>Elegir</option>   
      <option value="PASAPORTE">PASAPORTE</option>           
      <option value="CC">CC</option>           
      <option value="TI">TI</option>           
      <option value="CE">CE</option>                 
    </select>          
    @error('typeIdentification') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Correo electrónico</label>
    <div class="position-relative has-icon-left">
      <input type="text" wire:model.lazy="email" class="form-control" placeholder="ej: correo@gmail.com" >
      <div class="form-control-position">
        <i class="ft-user"></i>
      </div>
    </div>
    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Teléfono</label>
    <div class="position-relative has-icon-left">
      <input type="text" wire:model.lazy="phone" class="form-control" placeholder="ej: 351-000-0000" >
      <div class="form-control-position">
        <i class="ft-user"></i>
      </div>
    </div>
    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Tipo de Persona</label>         
    <select wire:model='personTypeDian' class="form-control">
      <option value="Elegir" selected disabled>Elegir</option>   
      <option value="Natural">Natural</option>           
      <option value="Jurídica">Jurídica</option>           
    </select>          
    @error('personTypeDian') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Edad</label>         
    <select wire:model='age' class="form-control">
      <option value="Elegir" selected disabled>Elegir</option>   
      <option value="Menor de 18 años">Menor de 18 años</option>           
      <option value="Entre 18 y 60 años">Entre 18 y 60 años</option>           
      <option value="Mayor de 60 años">Mayor de 60 años</option>           
    </select>          
    @error('age') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Grupo Étnico</label>         
    <select wire:model='ethnicGroup' class="form-control">
      <option value="Elegir" selected disabled>Elegir</option>  
      <option value="Afrocolombiano">Afrocolombiano</option>           
      <option value="Mestizo">Mestizo</option>           
      <option value="Mayor de 60 años">Mayor de 60 años</option>           
    </select>          
    @error('ethnicGroup') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Discapacitado</label>         
    <select wire:model='disabled' class="form-control">
      <option value="Elegir" selected disabled>Elegir</option>  
      <option value="NO">NO</option>                               
      <option value="SI">SI</option>           
    </select>          
    @error('disabled') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Género</label>         
    <select wire:model='gender' class="form-control">
      <option value="Elegir" selected disabled>Elegir</option>  
      <option value="HOMBRE">HOMBRE</option>                               
      <option value="MUJER">MUJER</option>           
    </select>          
    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Ciudad</label>         
    <select wire:model='city' class="form-control">
      <option value="Elegir" selected disabled>Elegir</option>  
       @foreach($municipios as $municipio)                          
        <option value="{{$municipio->id}}">{{$municipio->municipio}}</option>       
        @endforeach    
    </select>          
    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-4">
  <div class="form-group">
    <label>Departamento</label>         
    <select wire:model='deptoPerson' class="form-control">
      <option value="Elegir" selected disabled>Elegir</option>  
      @foreach($departamentos as $depto)                          
        <option value="{{$depto->id}}">{{$depto->departamento}}</option>       
        @endforeach  
    </select>          
    @error('deptoPerson') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>


<div class="col-sm-12 col-md-10">
  <div class="form-group">
    <label>Dirección Física</label>
    <div class="position-relative has-icon-left">
      <input type="text" wire:model.lazy="address" class="form-control" placeholder="dirección.." >
      <div class="form-control-position">
        <i class="ft-home"></i>
      </div>
    </div>
    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>
<div class="col-sm-12 col-md-2 text-right">
  @if(!$personSelected)
  <button wire:click.prevent='addPerson()' 
  class="btn btn-info btn-md" style="margin-top:2rem "><i class="la la-check"></i>Agregar
</button>
@else
<button wire:click.prevent='cancelEdit()' 
class="btn btn-dark btn-md" style="margin-top:2rem; margin-right: 10px "><i class="la la-refresh"></i>
</button>
<button wire:click.prevent='updatePerson()' 
class="btn btn-success btn-md" style="margin-top:2rem "><i class="la la-edit"></i>Actualizar
</button>
@endif
</div>

<div class="col-sm-12">
  <div class="table-responsive">
    <table  class="table table-hover table-xl mb-0 table-de mt-1">
      <thead class="bg-dark text-white">
        <tr>
          <th class="table-th">PERSONA</th>  
          <th class="table-th text-center">TIPO</th>  
          <th class="table-th text-center">IDENTIFICACIÓN</th>  
          <th class="table-th text-center"></th>

        </tr>
      </thead>
      <tbody>
        @foreach($persons as $person)
        <tr>
          <td>{{$person->name}}</td>                   
          <td class="text-center">{{$person->person_type}}</td>                   
          <td class="text-center">{{$person->identification}} (<b>{{$person->identification_type}}</b>)</td>                   
          <td class="text-center">                      
            <a href="javascript:void(0);" wire:click="editPerson({{$person->id}})" class="btn btn-warning" title="Edit">
              <i class="la la-edit"></i>
            </a>

            <a href="javascript:void(0);" onclick="Confirm('{{$person->id}}', 'deletePerson')" 
              class="btn btn-danger" title="Delete">
              <i class="la la-trash la-xl"></i>
            </a>                      


          </td>

        </tr>

        @endforeach
      </tbody>
    </table>  
  </div>


  

</div>



