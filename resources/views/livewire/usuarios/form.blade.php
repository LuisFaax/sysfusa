 @include('common.modalHead')

              <div class="row">
                <div class="col-sm-12">
                 <div class="form-group">
                  <label>Nombre</label>
                  <div class="position-relative has-icon-left">
                    <input type="text" wire:model.lazy="name" class="form-control" placeholder="ej: Luis Fax" >
                    <div class="form-control-position">
                      <i class="ft-edit-2"></i>
                    </div>
                  </div>
                  @error('name') <span class="text-danger er">{{ $message }}</span> @enderror
                </div>
              </div>             
              <div class="col-sm-12 col-md-6">
                 <div class="form-group">
                  <label >Email</label>
                  <div class="position-relative has-icon-left">
                    <input type="email" wire:model.lazy="email" class="form-control" placeholder="ej: correo@gmail.com" >
                    <div class="form-control-position">
                      <i class="la la-envelope"></i>
                    </div>
                  </div>
                  @error('email') <span class="text-danger er">{{ $message }}</span> @enderror
                </div>
              </div>
               <div class="col-sm-12 col-md-6">
                 <div class="form-group">
                  <label >Contraseña</label>
                  <div class="position-relative has-icon-left">
                    <input type="password" wire:model.lazy="password" class="form-control" autocomplete="new-password"   >
                    <div class="form-control-position">
                      <i class="la la-key"></i>
                    </div>
                  </div>
                  @error('password') <span class="text-danger er">{{ $message }}</span> @enderror
                </div>
              </div>                        
                   
              <div class="col-sm-12 col-md-6">
                 <div class="form-group">
                  <label >Teléfono</label>
                  <div class="position-relative has-icon-left">
                    <input type="text" wire:model.lazy="phone" maxlength="10" class="form-control" placeholder="ej: 351 000 00 00" >
                    <div class="form-control-position">
                      <i class="ft-phone"></i>
                    </div>
                  </div>
                  @error('phone') <span class="text-danger er">{{ $message }}</span> @enderror
                </div>
              </div>

               <div class="col-sm-12 col-md-6">
                 <div class="form-group">
                  <label >Asignar Role</label>                  
                    <select wire:model.lazy="role" class="form-control">
                      <option value="Elegir" selected>Elegir</option>                      
                     @foreach($roles as $role)
                     <option value="{{$role->id}}">{{$role->name}}</option>
                     @endforeach
                    </select>                  
                  @error('role') <span class="text-danger er">{{ $message }}</span> @enderror
                </div>
              </div>


              <div class="col-sm-12">
                 <div class="form-group">
                  <label>Imágen de perfil</label>                
                    <input type="file"  wire:model="image" accept="image/x-png, image/gif, image/jpeg"  class="form-control">                 
                  @error('image') <span class="error">{{ $message }}</span> @enderror
                </div>
              </div>


            </div>
         
            


@include('common.modalFooter')