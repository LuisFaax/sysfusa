 @include('common.modalHead')
              <div class="row">
                <div class="col-sm-12">
                 <div class="form-group">
                  <label>Nombre del anexo</label>
                  <div class="position-relative has-icon-left">
                    <input type="text" wire:model.lazy="anexo" class="form-control" placeholder="anexo.." >
                    <div class="form-control-position">
                      <i class="ft-edit-2"></i>
                    </div>
                  </div>
                  @error('anexo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>          
            </div>
@include('common.modalFooter')