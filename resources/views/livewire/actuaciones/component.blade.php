<div>
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><b class='h3 font-weight-bold'>{{$componentName}}</b> | {{$pageTitle}}</b></h4>
					
					<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
					<div class="heading-elements">
						@if(isset($data) && $data !=null)
						<button class="btn btn-secondary btn-md btn-modal"  data-toggle="modal" data-target="#theModal" >
							<i class="ft-check white"></i> Nueva Actuación
						</button>
						@endif
					</div>

				</div>
				<div class="card-content">
					<div class="card-body">						
						<div class="row justify-content-between">
							<div class="col-md-3 col-sm-12">
								<fieldset class="form-group position-relative has-icon-left">
									@can('actuaciones_search')
									<input type="text" 
									wire:model="search"               
									class="form-control"  placeholder="Ingresa el número de radicación">
									@endcan
									<div class="form-control-position">
										<i class="la la-search primary font-medium-5"></i>
									</div>
								</fieldset>
							</div>

						</div>

							<div class="row">
								<div class="col-sm-12 col-md-4">
									
								
						<div class="table-responsive">
							<div class="bs-callout-primary callout-border-left p-1">
								@if(isset($data) && $data !=null)
								<strong>CLASE PROCESO</strong>
								<h5>{{$data[0]->proceso->proceso}}</h5>
								@endif
							</div>
							<div class="bs-callout-info callout-border-left mt-1 p-1">
								@if(isset($data) && $data !=null)
								<strong>DEMANDANTES</strong>
								@foreach($data[0]->demandantes as $dtes)
								<h5>{{$dtes->nombre}}</h5>
								@endforeach
								@endif
							</div>
							<div class="bs-callout-info callout-border-left mt-1 p-1">
								@if(isset($data) && $data !=null)
								<strong>DEMANDADOS</strong>
								@foreach($data[0]->demandados as $ddos)
								<h5>{{$ddos->nombre}}</h5>
								@endforeach
								@endif
							</div>
						</div>
						</div>
						<div class="col-sm-12 col-md-8">
							@if(isset($actuaciones))
							<div class="table-responsive">
							<table  class="table table-hover table-xl mb-0 table-de mt-1">
								<thead class="bg-dark text-white">
									<tr>
										<th class="table-th">Número</th>	
										<th class="table-th">Fecha</th>	
										<th class="table-th">Actuación</th>	
										<th class="table-th">Documento</th>	
										<th class="table-th text-center">ACTIONS</th>

									</tr>
								</thead>
								<tbody>
									@foreach($actuaciones as $r)
									<tr>
										<td>@if($r->radicacion->numero)
													{{$r->radicacion->numero}}
													@else
													{{$r->radicacion->cup}}
													@endif
												</td>										
										<td>{{$r->fecha_registro}}</td>										
										<td>{{$r->decision->decision}}</td>										
										<td>{{$r->archivo}}</td>										
										<td class="text-center">											
											

										</td>

									</tr>

									@endforeach
								</tbody>
							</table>
							
						</div>
							@endif
						</div>
							</div>

					</div>
				</div>
				@include('livewire.actuaciones.form')	
			</div>
		</div>
	</section>

</div>


<script>


	document.addEventListener('DOMContentLoaded', function () {  
//$('#theModal').modal({backdrop: 'static', keyboard: false}) 

/*
	$('.btn-modal').click(function(){
		$('#theModal').modal({
			backdrop: 'static'
		});
	});
	*/

		//listen anexo-added event
		window.livewire.on('actuacion-added', Msg => {
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