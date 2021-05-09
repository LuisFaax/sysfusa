<h4 class="text-center text-danger col-sm-12"><b> ADJUNTOS </b></h4>      

<div class="row">
  <div class="col-sm-10">
    <div class="form-group">
      <div class="controls">
        <div class="input-group">
          <input type="file" wire:model.lazy="xxxx" class="form-control">
          <div class="input-group-append">
            <select class="form-control">
              <option value="Poder">Poder</option>           
              <option value="Demanda">Demanda</option>           
              <option value="Anexos de la Demanda">Anexos de la Demanda</option>           
            </select>   
          </div>
        </div>
      </div>  
      @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="col-sm-2">
    <button class="btn btn-info btn-sm"><i class="la la-plus"></i></button>      
  </div>
</div>

    {{-- <div class="col-sm-12 ">
      <div class="form-group">
        <label>Poder</label>
        <div class="position-relative has-icon-left">
          <input type="file" wire:model.lazy="xxxx" class="form-control">
        </div>
        @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div> --}}

    {{-- <div class="col-sm-12 ">
      <div class="form-group">
        <label>Demanda</label>
        <div class="position-relative has-icon-left">
          <input type="file" wire:model.lazy="xxxx" class="form-control">
        </div>
        @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div> --}}

    {{-- <div class="col-sm-12 ">
      <div class="form-group">
        <label>Anexos de la Demanda</label>
        <div class="position-relative has-icon-left">
          <input type="file" wire:model.lazy="xxxx" class="form-control">
        </div>
        @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div> --}}