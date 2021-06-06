<div>
	<style>
	.list-group-item {
		position: relative;
		display: block;
		padding: 0.25rem 1.25rem;
		margin-bottom: -1px;
		background-color: #fff;
		border: 1px solid #e4e7ed;
	}
</style>
<section class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title"><b class='h3 font-weight-bold'>{{$componentName}}</b> | {{$pageTitle}}</b></h4>					
				<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
				<div class="heading-elements">
					@if(!$modal)
					@can('radicar_create')
					<button wire:click.prevent="changeView(1)" class="btn btn-secondary btn-md" >
						<i class="ft-check white"></i> Nueva Radicación
					</button>
					@endcan
					@endif
				</div>
			</div>
			<div class="card-content">
				<div class="card-body">	
					@if(!$modal)					
					@can('radicar_search')
					@include('common.searchbox')
					@endcan
					<div class="table-responsive">
						<table  class="table table-hover table-xl mb-0 table-de mt-1">
							<thead class="bg-dark text-white">
								<tr>										
									<th class="table-th text-left">NUMERO</th>	
									<th class="table-th text-center">DEMANDANTES</th>
									<th class="table-th text-center">DEMANDADOS</th>
									<th class="table-th text-center">TIPO PROCESO</th>
									<th class="table-th text-center">JUZGADO</th>
									<th class="table-th text-center">FECHAS</th>
									<th class="table-th text-center">ESTATUS</th>	
									<th class="table-th text-center">ACTIONS</th>	
								</tr>
							</thead>
							<tbody>
								@foreach($data as $r)
								<tr>
									<td class="text-left"> 
										@if($r->numero)
										{{$r->numero}}
										@else
										@can('radicar_edit')
										<a href="javascript:void(0)" 
										class="text-danger" wire:click="$emit('editCup',{{$r->id}})">{{$r->cup}}</a>
										@endcan
										@endif
									</td>								
									<td class="text-center">
										@foreach($r->demandantes as $dtes)
										<span>{{$dtes->nombre}}</span><br>
										@endforeach
									</td>										
									<td class="text-center">
										@foreach($r->demandados as $ddos)
										<span>{{$ddos->nombre}}</span><br>
										@endforeach
									</td>	
									<td class="text-center"> 
										{{$r->proceso->proceso}}
									</td>											
									<td class="text-center"> 
										{{$r->juzgado->juzgado}}
									</td>
									<td class="text-center"> 
										<h5><span class="text-info">Radicación</span>: {{$r->fecha_radicar}}</h5>
										<h5><span class="text-success">Presentación</span>: {{$r->fecha_presenta}}</h5>
									</td>
									<td class="text-center">
										{{$r->estatus}}
									</td>

									<td class="text-center">
										@can('radicar_change_estatus')											
										@if($r->estatus == 'Abierta' && $r->numero ==null)
										<a href="javascript:void(0);" wire:click="changeEstatus({{$r->id}})" 
											class="btn btn-warning edit" 
											title="Edit">
											<i class="la la-refresh"></i>
										</a>
										@endif
										@endcan
										@can('radicar_destroy')
										<a href="javascript:void(0);" onclick="Confirm('{{$r->id}}')" 
											class="btn btn-danger" title="Delete">
											<i class="la la-trash la-xl"></i>
										</a>	
										@endcan									
									</td>
									

								</tr>
								@endforeach
							</tbody>
						</table>
						{{$data->links()}}
					</div>
					@else
					@include('livewire.radicaciones.form')	
					@endif
					@include('livewire.radicaciones.partials.changecup')	
				</div>
			</div>
		</div>
	</div>
	
</section>

</div>


<script>
	document.addEventListener('DOMContentLoaded', function () {  

		
		$('.btn-modal').click(function(){	
			$('#theModal').modal('show')		
			
		});
		window.livewire.on('edit-info-loaded', Msg => {
			$('body.er').css('display','none')	
			console.log('entra')
		});


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
		window.livewire.on('person-exists', Msg => {
			alert(Msg)      
		})
		window.livewire.on('person-added', Msg => {			
			alerts('success', Msg)
		})
		window.livewire.on('person-updated', Msg => {			
			alerts('success', Msg)
		})
		window.livewire.on('atachment-deleted', Msg => {			
			alerts('success', Msg)
		})
		window.livewire.on('person-missing', Msg => {				
			alerts('error', Msg)
		})
		window.livewire.on('atachment-missing', Msg => {				
			alerts('error', Msg)
		})
		window.livewire.on('radicar-added', Msg => {				
			alerts('success', Msg)
		})
		window.livewire.on('cup-updated', Msg => {	
			$('#modalCup').modal('hide')			
			alerts('success', Msg)
		})
		window.livewire.on('estatus-updated', Msg => {						
			alerts('success', Msg)
		})
		window.livewire.on('modalCup-show', Msg => {
			$('#modalCup').modal('show')          
		})
		$('#modalCup').on('shown.bs.modal', function (e) {
			$('body .cupfinal').focus()
		})



		

	})

	function openModalCup(id) {
		window.livewire.emit('show-modal-cup', id)      		
	}

	function Confirm(id, eventName = 'deleteRow')
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
				window.livewire.emit(eventName, id)                       
				swal.close()  
			}
		})

	}
</script>