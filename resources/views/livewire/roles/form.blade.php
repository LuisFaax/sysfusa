     @include('common.modalHead')
     <div class="row">
      <div class="col-sm-12">
       <div class="form-group">
        <label>Nombre del role</label>
        <div class="position-relative has-icon-left">
          <input type="text" wire:model.lazy="roleName" class="form-control" 
          placeholder="ejemplo: Admin" >
          <div class="form-control-position">
            <i class="ft-edit-2"></i>
          </div>
        </div>
        @error('roleName') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>          
    </div>


    </div>
    <div class="modal-footer">
      <button type="button" wire:click.prevent="resetUI()" class="btn btn-secondary close-btn" data-dismiss="modal">CERRAR</button>
      @if($selected_id < 1) 
      <button type="button" wire:click.prevent="CreateRole()" class="btn btn-dark close-modal">GUARDAR</button>
      @else
      <button type="button" wire:click.prevent="UpdateRole()" class="btn btn-dark close-modal">ACTUALIZAR</button>
      @endif
    </div>
    </div>
    </div>
    </div>