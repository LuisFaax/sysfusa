<h4 class="text-center text-danger col-sm-12"><b> ADJUNTOS </b></h4>      

    <div class="col-sm-12 ">
          <div class="form-group">
            <label>Poder</label>
            <div class="position-relative has-icon-left">
              <input type="file" wire:model.lazy="xxxx" class="form-control">
            </div>
            @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

    <div class="col-sm-12 ">
          <div class="form-group">
            <label>Demanda</label>
            <div class="position-relative has-icon-left">
              <input type="file" wire:model.lazy="xxxx" class="form-control">
            </div>
            @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

    <div class="col-sm-12 ">
          <div class="form-group">
            <label>Anexos de la Demanda</label>
            <div class="position-relative has-icon-left">
              <input type="file" wire:model.lazy="xxxx" class="form-control">
            </div>
            @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>