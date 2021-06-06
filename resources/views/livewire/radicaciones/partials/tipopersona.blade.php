<div class="col-sm-12 col-md-12">
	<div class="form-group">
		<label>Tipo de persona</label>         
		<select wire:model='personType' class="form-control">
			<option value="Elegir" selected disabled>Elegir</option>  
			<option value="DEMANDANTE">DEMANDANTE</option>
			<option value="APODERADO DEMANDANTE">APODERADO DEMANDANTE</option>			
			<option value="DEMANDADO">DEMANDADO</option>           
			<option value="APODERADO DEMANDADO">APODERADO DEMANDADO</option>
		</select>          
		@error('personType') <span class="text-danger">{{ $message }}</span> @enderror
	</div>
</div>

@include('livewire.radicaciones.partials.demandado')

{{-- @include('livewire.radicaciones.partials.demandante') --}}