        <div class="row">
          <div class="col-sm-12 ">

            <div class="form-group">
              <label><b>Código Único de Proceso</b></label>
              <div class="position-relative has-icon-left">
                <input type="text" wire:model.lazy="cup" class="form-control" readonly >
                <div class="form-control-position">
                  <i class="ft-edit-2"></i>
                </div>
              </div>
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            @include('livewire.radicaciones.partials.tipo')
          </div>          

        </div> 

        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
          <li class="nav-item ">
            <a class="nav-link {{$atachFile == null ? 'active' : '' }}" id="base-tab-tipo-persona" data-toggle="tab" aria-controls="tab-tipo-persona" href="#tab-tipo-persona" aria-expanded="true"><b>PERSONAS</b></a>
          </li>
          
          
          <li class="nav-item ">
            <a class="nav-link {{$atachFile !=null ? 'active' : '' }}" id="base-tab44" data-toggle="tab" aria-controls="tab44" href="#tab44" aria-expanded="false"><b>ADJUNTOS</b></a>
          </li>
        </ul>

        <div class="tab-content px-1 pt-1">
          <div role="tabpanel" class="tab-pane {{$atachFile == null ? 'active' : '' }}" id="tab-tipo-persona" aria-expanded="true" aria-labelledby="base-tab-tipo-persona">
            <div class="row">
              <!-- INICIA DEMANDANTE -->
              @include('livewire.radicaciones.partials.tipopersona')
            </div>
          </div>
          
          
          <div  class="tab-pane {{$atachFile !=null ? 'active' : '' }}" id="tab44" aria-labelledby="base-tab44">

            <!-- ADJUNTOS -->
            @include('livewire.radicaciones.partials.adjuntos')
            
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" wire:click.prevent="resetUI()" class="btn btn-secondary close-btn" data-dismiss="modal">CERRAR</button>
        @if($selected_id < 1) 
        <button type="button" wire:click.prevent="Store()" class="btn btn-dark close-modal">GUARDAR</button>
        @else
        <button type="button" wire:click.prevent="Update()" class="btn btn-dark close-modal">ACTUALIZAR</button>
        @endif
      </div>
    </div>
  </div>
</div>

@if ($errors->any())
<script>
  alerts('error','Por favor revisa los mensajes de error')
</script>
@endif