<div>
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><b class='h3 font-weight-bold'>{{$componentName}}</b> | {{$pageTitle}}</b></h4>
					
					<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
					<div class="heading-elements">
						<button class="btn btn-secondary btn-md" data-toggle="modal" data-target="#theModal"><i class="ft-check white"></i> Nueva Actuación</button>
					</div>

				</div>
				<div class="card-content">
					<div class="card-body">						
						<div class="row justify-content-between">
							<div class="col-lg-4 col-md-4 col-sm-12">
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

						<div class="table-responsive">
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
					</div>
				</div>
				@include('livewire.actuaciones.form')	
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