 @include('common.modalHead')
              <div class="row">
                <div class="col-sm-12">
                 <div class="form-group">
                  <label>ID</label>
                  <div class="position-relative has-icon-left">
                    <input type="text" wire:model.lazy="customid" class="form-control" placeholder="número único.." maxlength="12" >
                    <div class="form-control-position">
                      <i class="ft-edit-2"></i>
                    </div>
                  </div>
                  @error('customid') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>                

              <div class="col-sm-12">
                 <div class="form-group">
                  <label>Juzgado</label>
                  <div class="position-relative has-icon-left">                    
                    <textarea name="" id="" cols="30" rows="10" wire:model.lazy="juzgado" class="form-control" placeholder="juzgado.."></textarea>
                    <div class="form-control-position">
                      <i class="ft-edit-2"></i>                    
                  </div>
                </div>
                  @error('juzgado') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>

              <div class="col-sm-12">
                 <div class="form-group">
                  <label>Número</label>
                  <div class="position-relative has-icon-left">
                    <input type="number" wire:model.lazy="numero" class="form-control" placeholder="número.." maxlength="3" >
                    <div class="form-control-position">
                      <i class="ft-edit-2"></i>
                    </div>
                  </div>
                  @error('numero') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div> 


               <div class="col-sm-12">
                 <div class="form-group">
                  <label>Email</label>
                  <div class="position-relative has-icon-left">
                    <input type="email" wire:model.lazy="email" class="form-control" placeholder="email.." >
                    <div class="form-control-position">
                      <i class="ft-edit-2"></i>                    
                  </div>
                  @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>  
            </div>
          </div>
@include('common.modalFooter')