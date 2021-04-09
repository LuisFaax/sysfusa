 @include('common.modalHead')
    <div class="row">
      <div class="col-sm-12">

        <div class="form-group">
          <label>Proceso</label>
          <div class="position-relative has-icon-left">
            <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="xxxxxx..." >
            <div class="form-control-position">
              <i class="ft-edit-2"></i>
            </div>
          </div>
          @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label>Demandante</label>
          <div class="position-relative has-icon-left">
            <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="Nombre del Demandante..." >
            <div class="form-control-position">
              <i class="ft-user"></i>
            </div>
          </div>
          @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label>Apoderado</label>
          <div class="position-relative has-icon-left">
            <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="Nombre del Apoderado del Demandante..." >
            <div class="form-control-position">
              <i class="ft-user"></i>
            </div>
          </div>
          @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label>Demandado</label>
          <div class="position-relative has-icon-left">
            <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="Nombre del Demandado..." >
            <div class="form-control-position">
              <i class="ft-user"></i>
            </div>
          </div>
          @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label>Apoderado</label>
          <div class="position-relative has-icon-left">
            <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="Nombre del Apoderado del Demandado..." >
            <div class="form-control-position">
              <i class="ft-user"></i>
            </div>
          </div>
          @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label>Fecha radicación</label>
          <div class="position-relative has-icon-left">
            <input type="date" wire:model.lazy="xxxx" class="form-control">
            <div class="form-control-position">
              <i class="ft-calendar"></i>
            </div>
          </div>
          @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

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

        <div class="form-group">
          <label>Expedientes</label>
          <div class="position-relative has-icon-left">
            <input type="file" wire:model.lazy="xxxx" class="form-control">
          </div>
          @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label>Poder</label>
          <div class="position-relative has-icon-left">
            <input type="file" wire:model.lazy="xxxx" class="form-control">
          </div>
          @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label>Demanda</label>
          <div class="position-relative has-icon-left">
            <input type="file" wire:model.lazy="xxxx" class="form-control">
          </div>
          @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
          <label>Anexos de la Demanda</label>
          <div class="position-relative has-icon-left">
            <input type="file" wire:model.lazy="xxxx" class="form-control">
          </div>
          @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

      </div>          
    </div>
@include('common.modalFooter')