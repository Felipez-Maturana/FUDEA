<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$soc->id}}">


	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Cambiar estado Usuario</h4>
			</div>

			<div class="modal-body">
				<p>Confirme si bloquear/desbloquear al usuario {{$soc->name}}</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<a href="{{URL::action('SocioController@bloquearUsuario',$soc->id)}}"><button type="submit" class="btn btn-primary">Confirmar</button></a>
			</div>
		</div>
	</div>
</div>