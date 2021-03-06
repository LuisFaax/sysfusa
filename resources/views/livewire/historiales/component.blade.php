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
						<div class="row justify-content-between">
							<div class="col-lg-3 col-md-3 col-sm-12">
								<fieldset class="form-group position-relative has-icon-left">
									<input type="text" 
									wire:model="search"               
									class="form-control"  placeholder="Ingresa el número de radicación">
									<div class="form-control-position">
										<i class="la la-search primary font-medium-5"></i>
									</div>
								</fieldset>
							</div>

						</div>

<div class="row">
<div class="col-sm-12 col-md-3 mt-3">
	
						
							<div class="bs-callout-primary callout-border-left p-1">
								<strong>CLASE PROCESO</strong>
								<h5>Pertenencia</h5>
							</div>
							<div class="bs-callout-info callout-border-left mt-1 p-1">
								<strong>DEMANDANTES</strong>
								<h5>Maria Luna</h5>
								<h5>José García</h5>
							</div>
							<div class="bs-callout-info callout-border-left mt-1 p-1">
								<strong>DEMANDADOS</strong>
								<h5>Carlos Valle</h5>
								<h5>Jesús Alvez</h5>
								<h5>Victoria Vaca</h5>
							</div>
						
					
</div>
<div class="col-sm-12 col-md-9">
	

						<div class="table-responsive">
							<table  class="table table-hover table-xl mb-0 table-de mt-1">
								<thead class="bg-dark text-white">
									<tr>
										<th class="table-th">ID</th>	
										<th class="table-th">ACTUACION</th>	
										<th class="table-th">DESCRIPCIÓN</th>	
										<th class="table-th">AJUNTO</th>	
										

									</tr>
								</thead>
								<tbody>
									
									<tr>
										<td>125</td>										
										<td>AUTO DE SUSTANCIACION</td>										
										<td>UNA DESCRIPCION</td>										
										<td>arhivo.pdf</td>										
										

									</tr>

									
								</tbody>
							</table>
							{{$data->links('vendor.livewire.bootstrap')}}
						</div>
						</div>
</div>

					</div>
				</div>
				
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