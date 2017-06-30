@extends('layouts.empresa')
@section('contenido')
	<h3>Ingresar RUN Socio</h3>

{!!Form::open(array('url'=>'empresa/index','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<input type="text" pattern="^[0-9]{1,}$" maxlength="8" class="form-control" name="searchText" placeholder="18971431" required value={{$searchText}}>

		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>

	</div>
</div>
{{Form::close()}}

<?php 
if(count($socio)==1 and $socio[0]->estadoSuscripcion==1) 
{
	echo('<div class="alert alert-success" role="alert">El socio cuenta con una suscripción <b>ACTIVA!</b></div>');
}
elseif (count($socio)==1 and $socio[0]->estadoSuscripcion==0) {
	echo('<div class="alert alert-danger" role="alert">Actualmente el socio <b>no cuenta</b> con una suscripción vigente</div>');
}
else if(count($socio)==0)
{
	echo ('<div class="alert alert-warning" role="alert">El rut ingresado no se encuentra en nuestros registros. Si crees que se trata de un error contáctanos! Fono: 2 2834 2847</div>');
} ?>
	<!-- <h3>Resultado:</h3> -->

	<!--Fin Contenido-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/validator/7.1.0/validator.js"></script>
@endsection
