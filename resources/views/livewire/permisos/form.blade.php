 @include('common.modalHead')
              <div class="row">
                <div class="col-sm-12">
                 <div class="form-group">
                  <label>Nombre del permiso</label>
                  <div class="position-relative has-icon-left">
                    <input type="text" wire:model.lazy="permissionName" class="form-control" placeholder="ej: radicar_index" >
                    <div class="form-control-position">
                      <i class="ft-edit-2"></i>
                    </div>
                  </div>
                  @error('permissionName') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>          
            </div>


</div>
    <div class="modal-footer">
      <button type="button" wire:click.prevent="resetUI()" class="btn btn-secondary close-btn" data-dismiss="modal">CERRAR</button>
      @if($selected_id < 1) 
      <button type="button" wire:click.prevent="CreatePermission()" class="btn btn-dark close-modal">GUARDAR</button>
      @else
      <button type="button" wire:click.prevent="UpdatePermission()" class="btn btn-dark close-modal">ACTUALIZAR</button>
      @endif
    </div>
    </div>
    </div>
    </div>