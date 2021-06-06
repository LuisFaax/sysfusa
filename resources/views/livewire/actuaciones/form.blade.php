 @include('common.modalHead')
 <div class="row">
  <h5 class="col-sm-12 text-center mb-3"><b>Radicado ID #125</b></h5>
  <div class="col-sm-12">
   <div class="form-group">
    <label>Fecha de Registro</label>
    <div class="position-relative has-icon-left">
      <input type="date" wire:model.lazy="fecha" class="form-control" placeholder="anexo.." >
      <div class="form-control-position">
        <i class="ft-edit-2"></i>
      </div>
    </div>
    @error('fecha') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>          

<div class="col-sm-12">
 <div class="form-group">
  <label>Actuación</label>

  <select wire:model="actuacionid" class="form-control">
    @foreach($decisiones as $d)
    <option value="{{$d->id}}">{{$d->decision}}</option>
    @endforeach
  </select>                  

  @error('actuacionid') <span class="text-danger">{{ $message }}</span> @enderror
</div>
</div> 

<div class="col-sm-12">
 <div class="form-group">
  <label>Descripción</label>
  <div class="position-relative has-icon-left">                   
    <textarea wire:model.lazy="descripcion" class="form-control" cols="30" rows="5"></textarea>
    <div class="form-control-position">
      <i class="ft-edit-2"></i>
    </div>
  </div>
  @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
</div>
</div>  

<div class="col-sm-12 ">
  <div class="form-group">
    <label>Archivo adjunto</label>
    <div class="position-relative has-icon-left">
      <input type="file" wire:model.lazy="archivo" class="form-control">
    </div>            
  </div>
</div>  


</div>
@include('common.modalFooter')