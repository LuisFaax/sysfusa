<div>
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><b class='h3 font-weight-bold'>{{$componentName}}</b> | {{$pageTitle}}</b></h4>
					
					<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
					<div class="heading-elements">
						<button class="btn btn-secondary btn-md" data-toggle="modal" data-target="#theModal"><i class="ft-check white"></i> Nuevo</button>
					</div>

				</div>
				<div class="card-content">
					<div class="card-body">						
						@include('common.searchbox')
						<div class="table-responsive">
							<table  class="table table-hover table-xl mb-0 table-de mt-1">
								<thead class="bg-dark text-white">
									<tr>
										<th class="table-th">ANEXO</th>	
										<th class="table-th text-center">ACTIONS</th>

									</tr>
								</thead>
								<tbody>
									@foreach($data as $r)
									<tr>
										<td>{{$r->anexo}}</td>										
										<td class="text-center">											
											<a href="javascript:void(0);" wire:click="Edit({{$r->id}})" class="btn btn-warning" title="Edit">
												<i class="la la-edit"></i>
											</a>

											<a href="javascript:void(0);" onclick="Confirm('{{$r->id}}')" 
												class="btn btn-danger" title="Delete">
												<i class="la la-trash la-xl"></i>
											</a>											


										</td>

									</tr>

									@endforeach
								</tbody>
							</table>
							{{$data->links('vendor.livewire.bootstrap')}}
						</div>
					</div>
				</div>
				@include('livewire.anexoscatalogo.form')	
			</div>
		</div>
	</section>



</div>


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