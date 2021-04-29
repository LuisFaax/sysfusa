 @include('common.modalHead')
              <div class="row">
                <div class="col-sm-12">
                 <div class="form-group">
                  <label>Decisión</label>
                  <div class="position-relative has-icon-left">
                    <input type="text" wire:model.lazy="decision" class="form-control" placeholder="decisión.." >
                    <div class="form-control-position">
                      <i class="ft-edit-2"></i>
                    </div>
                  </div>
                  @error('decision') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>          
              <div class="col-sm-12">
                 <div class="form-group">
                  <label>Código</label>
                  <div class="position-relative has-icon-left">
                    <input type="text" wire:model.lazy="codigo" class="form-control" placeholder="código.." >
                    <div class="form-control-position">
                      <i class="ft-edit-2"></i>
                    </div>
                  </div>
                  @error('codigo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>  
            </div>
@include('common.modalFooter')