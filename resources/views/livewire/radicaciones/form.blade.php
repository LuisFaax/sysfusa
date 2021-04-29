<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-dark">
        <h5 class="modal-title text-white" id="exampleModalLabel">
          <b>{{$componentName}}</b> | {{ $selected_id > 0 ? 'EDITAR' : 'CREAR' }}
        </h5> 
        <h5 class="text-center text-white" wire:loading>PROCESANDO...</h5>      
      </div>
      <div class="modal-body">


        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label><b>Código Único de Proceso</b></label>
              <div class="position-relative has-icon-left">
                <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="Ingresa los 23 dígitos de código" >
                <div class="form-control-position">
                  <i class="ft-edit-2"></i>
                </div>
              </div>
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>  
        </div> 

        <ul class="nav nav-tabs nav-linetriangle no-hover-bg">
          <li class="nav-item">
            <a class="nav-link active" id="base-tab-demandante" data-toggle="tab" aria-controls="tab-demandante" href="#tab-demandante" aria-expanded="true">DEMANDANTE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="base-tab42" data-toggle="tab" aria-controls="tab42" href="#tab42" aria-expanded="false">DEMANDADO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="base-tab43" data-toggle="tab" aria-controls="tab43" href="#tab43" aria-expanded="false">TIPO DE PROCESO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="base-tab44" data-toggle="tab" aria-controls="tab44" href="#tab44" aria-expanded="false">ADJUNTOS</a>
          </li>
        </ul>
        <div class="tab-content px-1 pt-1">
          <div role="tabpanel" class="tab-pane active" id="tab-demandante" aria-expanded="true" aria-labelledby="base-tab-demandante">
            <div class="row">
              <!-- INICIA DEMANDANTE -->
              @include('livewire.radicaciones.demandante')
            </div>
          </div>
          <div class="tab-pane" id="tab42" aria-labelledby="base-tab42">
            <div class="row">
              <!-- INICIA DEMANDADO -->
              @include('livewire.radicaciones.demandado')
            </div>
          </div>
          <div class="tab-pane" id="tab43" aria-labelledby="base-tab43">
            <div class="row">
              <!-- TIPO DE PROCESO -->
              @include('livewire.radicaciones.tipo')
            </div>
          </div>
          <div class="tab-pane" id="tab44" aria-labelledby="base-tab44">
            <div class="row">
              <!-- ADJUNTOS -->
              @include('livewire.radicaciones.adjuntos')
            </div>
          </div>
        </div>









        


        


        


        
        @include('common.modalFooter')