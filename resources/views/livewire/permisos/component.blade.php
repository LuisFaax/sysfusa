<div>
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><b class='h3 font-weight-bold'>{{$componentName}}</b> | {{$pageTitle}}</b></h4>
					
					<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
					<div class="heading-elements">
						@can('permisos_create')
						<button class="btn btn-secondary btn-md" data-toggle="modal" data-target="#theModal"><i class="ft-check white"></i> Nuevo</button>
						@endcan
					</div>

				</div>
				<div class="card-content">
					<div class="card-body">	
						@can('permisos_search')					
						@include('common.searchbox')
						@endcan
						<div class="table-responsive">
							<table  class="table table-hover table-xl mb-0 table-de mt-1">
								<thead class="bg-dark text-white">
									<tr>
										<th class="table-th">ID</th> 
										<th class="table-th text-center">DESCRIPCIÓN</th> 
										<th class="table-th text-center">ACTIONS</th>

									</tr>
								</thead>
								<tbody>
									@foreach($permisos as $permiso)
									<tr>
										<td><h6>{{$permiso->id}}</h6></td>
										<td><h6 class="text-center">{{ strtoupper($permiso->name)}}</h6></td>

										<td class="text-center">
											@can('permisos_edit')									
											<a href="javascript:void(0);" wire:click="Edit({{$permiso->id}})" class="btn btn-warning" title="Edit">
												<i class="la la-edit"></i>
											</a>
											@endcan

											@can('permisos_destroy')
											@if(\App\Models\User::permission($permiso->name)->count() < 1 )
											<a href="javascript:void(0);" onclick="Confirm('{{$permiso->id}}')" 
												class="btn btn-danger" title="Delete">
												<i class="la la-trash la-xl"></i>
											</a>	
											@endif	
											@endcan									


										</td>

									</tr>

									@endforeach
								</tbody>
							</table>
							{{$permisos->links()}}
						</div>
					</div>
				</div>
				@include('livewire.permisos.form')	
			</div>
		</div>
	</section>

</div>


<script>
	document.addEventListener('DOMContentLoaded', function () {  

		//listen permiso-added event
		window.livewire.on('permiso-added', Msg => {
			$('#theModal').modal('hide')
			noty(Msg)
		})		
		window.livewire.on('permiso-updated', Msg => {
			$('#theModal').modal('hide')
			noty(Msg)
		})		
		window.livewire.on('permiso-deleted', Msg => {			
			noty(Msg)
		})
		window.livewire.on('permiso-exists', Msg => {			
			noty(Msg)
		})
		window.livewire.on('permiso-error', Msg => {			
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
				window.livewire.emit('destroy', id)                       
				swal.close()  
			}
		})


		



	}
</script>