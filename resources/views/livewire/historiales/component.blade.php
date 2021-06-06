<div>
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><b class='h3 font-weight-bold'>{{$componentName}}</b>  {{$pageTitle}}</b></h4>
					
					<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
					<div class="heading-elements">
						
					</div>

				</div>
				<div class="card-content">
					<div class="card-body">						
						<div class="row justify-content-between" x-data="{ isOpen: true }" @click.away="isOpen = false">
							<div class="col-sm-12 col-md-6">
								<fieldset class="form-group position-relative has-icon-left">
									@can('historiales_search')
									<input type="text" 
									wire:model="search"
									@focus="isOpen = true"
									@keydown.escape.window="isOpen = false"
									@keydown.shift.tab="isOpen = false"             
									class="form-control"  
									placeholder="Buscar actuaciones por cup, demandantes, demandados, tipo de proceso, folios, cuaderno...">
									@endcan
									<div class="form-control-position">
										<i class="la la-search primary font-medium-5"></i>
									</div>
								</fieldset>
								<ul class="list-group" x-show.transition.opacity="isOpen">
									@if($search !='')
									@foreach($data as $r)
									<li  wire:click="getRadicado({{$r->id}})" class="list-group-item list-group-item-action">                               
										<b>
											@if($r->radicacion->numero)
											{{$r->radicacion->numero}}
											@else
											{{$r->radicacion->cup}}
											@endif
										</b> - <h7 class="text-info">Tipo</h7>
									</li>
									@endforeach
									@endif
								</ul>
							</div>

						</div>
						<!--div buscador-->        
						

						@if($info)
						<div class="row">

							<div class="col-sm-12">


								<div class="table-responsive">
									<table  class="table table-hover table-xl mb-0 table-de mt-1">
										<thead class="bg-dark text-white">
											<tr>
												<th class="table-th">NÚMERO</th>	
												<th class="table-th">TIPO ACTUACION</th>	
												<th class="table-th">ARCHIVO</th>	


											</tr>
										</thead>
										<tbody>
											@foreach($info as $obj)
											<tr>												
												<td>@if($obj->radicacion->numero)
													{{$obj->radicacion->numero}}
													@else
													{{$obj->radicacion->cup}}
													@endif
												</td>
												<td>{{$obj->decision->decision}}</td>										

												<td>{{$obj->archivo}}</td>										



											</tr>

											@endforeach
										</tbody>
									</table>
									
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
				
			</div>
		</div>
	</section>

</div>


<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {  

		//listen anexo-added event
		window.livewire.on('anexo-added', Msg => {
			$('#theModal').modal('hide')
			alerts('success', Msg)
		})
		//listen anexo-updated event
		window.livewire.on('anexo-updated', Msg => {
			$('#theModal').modal('hide')
			alerts('success', Msg)
		})
		//listen anexo-deleted event
		window.livewire.on('anexo-deleted', Msg => {			
			alerts('success', Msg)
		})

		window.livewire.on('hide-modal', Msg => {
			$('#theModal').modal('hide')          
		})


		window.livewire.on('show-modal', Msg => {
			$('#theModal').modal('show')          
		})



		// alerts
		function alerts(type, message)
		{
			if(type == 'success')  toastr.success('', message.toUpperCase())
				if(type == 'error')  toastr.error('', message.toUpperCase())
					if(type == 'warning')  toastr.warning('', message.toUpperCase())



				}

		})


	function Confirm(id)
	{       
		swal({
			title: 'CONFIRMAR',
			text: '¿DESEAS ELIMINAR EL REGISTRO?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Aceptar',
			cancelButtonText: 'Cancelar',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			padding: '2em'
		}).then(function(result) {
			if (result.value) {                     
				window.livewire.emit('deleteRow', id)                       
				swal.close()  
			}
		})

	}
</script>