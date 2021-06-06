<h4 class="text-center text-danger col-sm-12"><b> ADJUNTOS </b></h4>      

<div class="row">
  <div class="col-sm-12 col-md-10">
    <div class="form-group">
      <div class="controls">
        <div class="input-group">
          <input type="file" wire:model.lazy="atachFile" class="form-control" accept="application/pdf">
          <div class="input-group-append">
            <select wire:model.lazy="atachType" class="form-control">
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
    @if($atachFile !='')
    <button wire:click.prevent="uploadingFiles()" class="btn btn-primary mr-1"><i class="ft-arrow"></i>Finalizar</button>      
    @endif
     <button wire:click.prevent="addAtachment()" class="btn btn-info"><i class="ft-arrow-up"></i>Precargar</button>   
  </div>
  <div class="table-responsive">
    <table  class="table table-hover table-xl mb-0 table-de mt-1">
      <thead class="bg-dark text-white">
        <tr>
          <th class="table-th">ARCHIVO</th>  
          <th class="table-th">TIPO</th>            
          <th class="table-th text-center"></th>

        </tr>
      </thead>
      <tbody>
        @foreach($atachments as $archivo)
        <tr>
          <td>{{$archivo->filename}}</td>                   
          <td>{{$archivo->type}}</td>                             
          <td class="text-center"> 

            <a href="javascript:void(0);"  
            onclick="Confirm('{{$archivo->id}}', 'deleteAtachment')" 
              class="btn btn-danger" title="Delete">
              <i class="la la-trash la-xl"></i>
            </a>                      


          </td>

        </tr>

        @endforeach
      </tbody>
    </table>  
  </div>
</div>

