<h4 class="text-center text-danger col-sm-12"><b> TIPO DE PROCESO </b></h4>
    <div class="col-sm-12 col-md-6">
      <div class="form-group">
              <label>Proceso a tramitar</label>         
              <select class="form-control">
                <option value="HOMBRE">HOMBRE</option>                               
                <option value="MUJER">MUJER</option>           
              </select>          
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    </div>
    <div class="col-sm-12 col-md-6">
      <div class="form-group">
              <label>Tipo de Proceso</label>         
              <select class="form-control">
                <option value="PRIMERA INSTANCIA">PRIMERA INSTANCIA</option>           
                <option value="ÚNICA INSTANCIA">ÚNICA INSTANCIA</option>                               
              </select>          
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    </div>
        <div class="col-sm-12 col-md-4">
          <div class="form-group">
            <label>Fecha de radicación</label>
            <div class="position-relative has-icon-left">
              <input type="date" wire:model.lazy="xxxx" class="form-control">
              <div class="form-control-position">
                <i class="ft-calendar"></i>
              </div>
            </div>
            @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

    <div class="col-sm-12 col-md-4">
          <div class="form-group">
            <label>Numero</label>
            <div class="position-relative has-icon-left">
              <input type="text" wire:model.lazy="xxxx" class="form-control">
              <div class="form-control-position">
                <i class="ft-edit-2"></i>
              </div>
            </div>
            @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

    <div class="col-sm-12 col-md-4">
          <div class="form-group">
            <label>Cuaderno</label>
            <div class="position-relative has-icon-left">
              <input type="text" wire:model.lazy="xxxx" class="form-control">
              <div class="form-control-position">
                <i class="ft-edit-2"></i>
              </div>
            </div>
            @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>