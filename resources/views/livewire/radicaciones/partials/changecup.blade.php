<div wire:ignore.self class="modal fade" id="modalCup" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header  bg-dark">
				<h5 class="modal-title text-white" id="exampleModalLabel">
					<b>{{$componentName}}</b> | Cambiar CUP
				</h5>	
				<h5 class="text-center text-white" wire:loading>Cambiando...</h5>			
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 ">

						<div class="form-group">
							<label><b>Ingresa el código único de proceso final</b></label>
							<div class="position-relative has-icon-left">
								<input type="text" wire:model.lazy="cupfinal" class="form-control cupfinal" maxlength="23" >
								<div class="form-control-position">
									<i class="ft-edit-2"></i>
								</div>
							</div>
							@error('cupfinal') <span class="text-danger">{{ $message }}</span> @enderror
						</div>						
					</div>          

				</div> 

			</div>
			<div class="modal-footer">
				<button type="button" wire:click.prevent="resetUI()" class="btn btn-secondary close-btn" data-dismiss="modal">CERRAR</button>

				<button type="button" wire:click.prevent="ChangeCup()" class="btn btn-dark close-modal">GUARDAR CAMBIOS</button>
				
			</div>
		</div>
	</div>
</div>