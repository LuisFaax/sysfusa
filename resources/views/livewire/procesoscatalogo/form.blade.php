 @include('common.modalHead')
              <div class="row">
                <div class="col-sm-12">
                 <div class="form-group">
                  <label>Proceso</label>
                  <div class="position-relative has-icon-left">
                    <input type="text" wire:model.lazy="proceso" class="form-control" placeholder="proceso.." >
                    <div class="form-control-position">
                      <i class="ft-edit-2"></i>
                    </div>
                  </div>
                  @error('proceso') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>          
            </div>
@include('common.modalFooter')