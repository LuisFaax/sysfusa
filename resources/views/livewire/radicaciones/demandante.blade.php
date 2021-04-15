<h4 class="col-sm-12 text-center text-danger"><b> DEMANDANTE </b></h4>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Nombre</label>
              <div class="position-relative has-icon-left">
                <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="nombre completo" >
                <div class="form-control-position">
                  <i class="ft-user"></i>
                </div>
              </div>
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Identificación</label>
              <div class="position-relative has-icon-left">
                <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="nombre completo" >
                <div class="form-control-position">
                  <i class="ft-user"></i>
                </div>
              </div>
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Correo electrónico</label>
              <div class="position-relative has-icon-left">
                <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="ej: correo@gmail.com" >
                <div class="form-control-position">
                  <i class="ft-user"></i>
                </div>
              </div>
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Teléfono</label>
              <div class="position-relative has-icon-left">
                <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="ej: 351-000-0000" >
                <div class="form-control-position">
                  <i class="ft-user"></i>
                </div>
              </div>
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Tipo de Persona</label>         
              <select class="form-control">
                <option value="Natural">Natural</option>           
                <option value="Jurídica">Jurídica</option>           
              </select>          
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Edad</label>         
              <select class="form-control">
                <option value="Menor de 18 años">Menor de 18 años</option>           
                <option value="Entre 18 y 60 años">Entre 18 y 60 años</option>           
                <option value="Mayor de 60 años">Mayor de 60 años</option>           
              </select>          
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Grupo Étnico</label>         
              <select class="form-control">
                <option value="Afrocolombiano">Afrocolombiano</option>           
                <option value="Mestizo">Mestizo</option>           
                <option value="Mayor de 60 años">Mayor de 60 años</option>           
              </select>          
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Discapacitado</label>         
              <select class="form-control">
                <option value="NO">NO</option>                               
                <option value="SI">SI</option>           
              </select>          
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Género</label>         
              <select class="form-control">
                <option value="HOMBRE">HOMBRE</option>                               
                <option value="MUJER">MUJER</option>           
              </select>          
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>

          <div class="col-sm-12 col-md-6">
            <div class="form-group">
              <label>Apoderado</label>
              <div class="position-relative has-icon-left">
                <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="nombre completo" >
                <div class="form-control-position">
                  <i class="ft-user"></i>
                </div>
              </div>
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label>Dirección Física</label>
              <div class="position-relative has-icon-left">
                <input type="text" wire:model.lazy="xxxx" class="form-control" placeholder="nombre completo" >
                <div class="form-control-position">
                  <i class="ft-home"></i>
                </div>
              </div>
              @error('radicado') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          
<div class="col-sm-12">
  <button class="btn btn-info btn-sm"><i class="la la-plus"></i></button>
</div>