<div>
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><b class='h3 font-weight-bold'>{{$componentName}}</b> | {{$pageTitle}}</b></h4>
					
					<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
					<div class="heading-elements">
						@can('users_create')
						<button class="btn btn-secondary btn-md" data-toggle="modal" data-target="#theModal"><i class="ft-check white"></i> Nuevo</button>
						@endcan
					</div>

				</div>
				<div class="card-content">
					<div class="card-body">	
						@can('users_search')					
						@include('common.searchbox')
						@endcan
						<div class="table-responsive">
							<table  class="table table-hover table-xl mb-0 table-de mt-1">
								<thead class="bg-dark text-white">
									<tr>
										<th class="table-th text-white">USUARIO</th>
										<th class="table-th text-white text-center">TELÉFONO</th>
										<th class="table-th text-white text-center">EMAIL</th>
										<th class="table-th text-white text-center">ROLE</th>
										<th class="table-th text-white text-center" width="8%">IMAGEN</th>
										<th class="table-th text-white text-center">ACTIONS</th>

									</tr>
								</thead>
								<tbody>
									@foreach($data as $r)
									<tr>
										<td><h6>{{$r->name}}</h6></td>										
										<td class="text-center">
											<h6>{{$r->phone}}</h6> 
										</td>
										<td class="text-center"><h6>{{$r->email}}</h6>	</td>
										<td class="text-center"><h6>{{$r->roles[0]->name}}</h6></td>										
										<td class="text-center">											
											
											<img class="card-img-top img-fluid" 
											src="{{ asset('storage/' . $r->avatar ) }}" > 
											
										</td>

										<td  class="text-center">
											@can('users_edit')								
											@if($r->email !='luisfaax@gmail.com')			
											<a href="javascript:void(0);" wire:click="Edit({{$r->id}})" class="btn btn-warning" title="Edit">
												<i class="la la-edit"></i>
											</a>
											@endcan
											@can('users_destroy')
											<a href="javascript:void(0);" onclick="Confirm('{{$r->id}}')" 
												class="btn btn-danger" title="Delete">
												<i class="la la-trash la-xl"></i>
											</a>		
											@endcan									

											@endif
										</td>

									</tr>

									@endforeach
								</tbody>
							</table>
							{{$data->links()}}
						</div>
					</div>
				</div>
				@include('livewire.usuarios.form')	
			</div>
		</div>
	</section>

</div>


<script>
	document.addEventListener('DOMContentLoaded', function () {  

		//listen user-added event
		window.livewire.on('user-added', Msg => {
			$('#theModal').modal('hide')
			noty(Msg)
		})
		//listen user-updated event
		window.livewire.on('user-updated', Msg => {
			$('#theModal').modal('hide')
			noty(Msg)
		})
		//listen user-deleted event
		window.livewire.on('user-deleted', Msg => {			
			noty(Msg)
		})
		window.livewire.on('hide-modal', Msg => {
			$('#theModal').modal('hide')          
		})
		window.livewire.on('show-modal', Msg => {
			$('#theModal').modal('show')          
		})
		$('#theModal').on('hidden.bs.modal', function (e) {			
			$('.er').css('display','none')
		})
		window.livewire.on('user-withradicados', Msg => {
			noty(Msg)        
		})


		

	})


	function Confirm(id)
	{       
		swal({
			title: 'CONFIRMAR',
			text: '¿DESEAS ELIMINAR EL REGISTRO?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aceptar',
			cancelButtonText: 'Cerrar',			
		}).then(function(result) {
			if (result.value) {                     
				window.livewire.emit('deleteRow', id)                       
				swal.close()  
			}
		})


		



	}
</script>