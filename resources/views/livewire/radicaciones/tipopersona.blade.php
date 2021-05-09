<div class="col-sm-12 col-md-12">
  <div class="form-group">
    <label>Tipo de </label>         
    <select class="form-control">
      <option value="DEMANDANTE">DEMANDANTE</option>                               
      <option value="DEMANDADO">DEMANDADO</option>           
    </select>          
    @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
</div>

{{-- @include('livewire.radicaciones.demandado') --}}

{{-- @include('livewire.radicaciones.demandante') --}}