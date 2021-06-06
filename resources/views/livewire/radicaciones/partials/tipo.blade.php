<h4 class="text-center text-info col-sm-12"><b> TIPO DE PROCESO </b></h4>
<div class="row">
  <div class="col-sm-12 col-md-3">                          
    <div class="form-group">
      <label>Juzgado</label>         
      <select class="form-control" wire:model='juzgado'>
        <option value="Elegir" selected disabled>Elegir</option>     
        @foreach($juzgados as $juzgado)                          
        <option value="{{$juzgado->id}}">{{$juzgado->juzgado}}</option>       
        @endforeach    
      </select>          
      @error('juzgado') <span class="text-danger">{{ $message }}</span> @enderror
    </div>   
  </div>

  <div class="col-sm-12 col-md-3">          
    <div class="form-group">
      <label>Tipo Proceso</label>         
      <select class="form-control" wire:model='otroTipo'>
         <option value="Elegir" selected disabled>Elegir</option>     
        @foreach($procesostipo as $proceso)                          
        <option value="{{$proceso->id}}">{{$proceso->proceso}}</option>       
        @endforeach                                 
      </select>          
      @error('otroTipo') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="col-sm-12 col-md-3"> 
    <div class="form-group">
      <label>Fecha de radicación</label>
      <div class="position-relative has-icon-left">
        <input type="date" wire:model.lazy="radicacionDate" value="{{ date('d-m-Y') }}" class="form-control">
        <div class="form-control-position">
          <i class="ft-calendar"></i>
        </div>
      </div>
      @error('radicacionDate') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="col-sm-12 col-md-3"> 
    <div class="form-group">
      <label>Numero (definido por el juzgado)</label>
      <div class="position-relative has-icon-left">
        <input type="text" wire:model.lazy="numero" class="form-control">
        <div class="form-control-position">
          <i class="ft-edit-2"></i>
        </div>
      </div>
      @error('numero') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="col-sm-12 col-md-3"> 
    <div class="form-group">
      <label>Cuaderno</label>
      <div class="position-relative has-icon-left">
        <input type="text" wire:model.lazy="notebook" class="form-control">
        <div class="form-control-position">
          <i class="ft-edit-2"></i>
        </div>
      </div>
      @error('notebook') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
   <div class="col-sm-12 col-md-3">          
    <div class="form-group">
      <label>Departamento</label>         
      <select class="form-control" wire:model='deptoProceso'>
        < <option value="Elegir" selected disabled>Elegir</option>     
        @foreach($departamentos as $depto)                          
        <option value="{{$depto->id}}">{{$depto->departamento}}</option>       
        @endforeach                                
      </select>          
      @error('deptoProceso') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
   <div class="col-sm-12 col-md-3">          
    <div class="form-group">
      <label>Municipio</label>         
      <select class="form-control" wire:model='municipality'>
         <option value="Elegir" selected disabled>Elegir</option>     
        @foreach($municipios as $municipio)                          
        <option value="{{$municipio->id}}">{{$municipio->municipio}}</option>       
        @endforeach                                
      </select>          
      @error('municipality') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
   <div class="col-sm-12 col-md-3">          
    <div class="form-group">
      <label>Entidad</label>         
      <select class="form-control" wire:model='entity'>
         <option value="Elegir" selected disabled>Elegir</option>     
        @foreach($entidades as $entidad)                          
        <option value="{{$entidad->id}}">{{$entidad->entidad}}</option>       
        @endforeach                                
      </select>          
      @error('entity') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="col-sm-12 col-md-3"> 
    <div class="form-group">
      <label>Folios</label>
      <div class="position-relative has-icon-left">
        <input type="text" wire:model.lazy="folios" class="form-control">
        <div class="form-control-position">
          <i class="ft-edit-2"></i>
        </div>
      </div>
      @error('folios') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
    <div class="col-sm-12 col-md-3"> 
    <div class="form-group">
      <label>Fecha de presentación</label>
      <div class="position-relative has-icon-left">
        <input type="date" wire:model.lazy="presentationDate" value="{{ date('d-m-Y') }}" class="form-control">
        <div class="form-control-position">
          <i class="ft-calendar"></i>
        </div>
      </div>
      @error('presentationDate') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
  <div class="col-sm-12 col-md-3">          
    <div class="form-group">
      <label>Tipo instancia</label>         
      <select class="form-control" wire:model='processType'>
         <option value="Elegir" selected disabled>Elegir</option>    
        <option value="PRIMERA INSTANCIA">PRIMERA INSTANCIA</option>           
        <option value="ÚNICA INSTANCIA">ÚNICA INSTANCIA</option>                               
      </select>          
      @error('processType') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>

</div>
<div class="row">
<div class="col-sm-12"> 
    <div class="form-group">
      <label>Descripción de la radicación</label>
      <div class="position-relative has-icon-left">
     <textarea wire:model="description" cols="30" rows="10" class="form-control"></textarea>
        <div class="form-control-position">
          <i class="ft-edit-2"></i>
        </div>
      </div>
      @error('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
</div>