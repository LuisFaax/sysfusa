<div wire:ignore.self class="modal fade" id="theModal" tabindex="-1" role="dialog" >
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header  bg-dark">
				<h5 class="modal-title text-white" id="exampleModalLabel">
					<b>{{$componentName}}</b> | {{ $selected_id > 0 ? 'EDITAR' : 'CREAR' }}
				</h5>	
				<h5 class="text-center text-white" wire:loading>PROCESANDO...</h5>			
			</div>
			<div class="modal-body">
				