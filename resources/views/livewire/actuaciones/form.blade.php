 @include('common.modalHead')
 <div class="row">
  <h5 class="col-sm-12 text-center mb-3"><b>Radicado ID #125</b></h5>
  <div class="col-sm-12">
   <div class="form-group">
    <label>Fecha de Registro</label>
    <div class="position-relative has-icon-left">
      <input type="date" wire:model.lazy="anexo" class="form-control" placeholder="anexo.." >
      <div class="form-control-position">
        <i class="ft-edit-2"></i>
      </div>
    </div>
    @error('anexo') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>          

<div class="col-sm-12">
 <div class="form-group">
  <label>Actuación</label>

  <select class="form-control">
    @foreach($decisiones as $d)
    <option value="{{$d->id}}">{{$d->decision}}</option>
    @endforeach
  </select>                  

  @error('anexo') <span class="text-danger">{{ $message }}</span> @enderror
</div>
</div> 

<div class="col-sm-12">
 <div class="form-group">
  <label>Descripción</label>
  <div class="position-relative has-icon-left">                   
    <textarea class="form-control" cols="30" rows="5"></textarea>
    <div class="form-control-position">
      <i class="ft-edit-2"></i>
    </div>
  </div>
  @error('anexo') <span class="text-danger">{{ $message }}</span> @enderror
</div>
</div>  

<div class="col-sm-12 ">
  <div class="form-group">
    <label>Archivo adjunto</label>
    <div class="position-relative has-icon-left">
      <input type="file" wire:model.lazy="xxxx" class="form-control">
    </div>            
  </div>
</div>  


</div>
@include('common.modalFooter')