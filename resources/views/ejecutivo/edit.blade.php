@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Socio: {{$socio->nombre}} {{$socio->apellidoPaterno}} {{$socio->apellidoMaterno}}</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger"> 
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($socio,['method'=>'PATCH','route'=>['ejecutivo.update',$socio->idSocio]])!!}
			{{Form::token()}}

			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$socio->nombre}}" placeholder="Nombre...">
			</div>

			
			<div class="form-group">
				<label for="apellidoPaterno">Apellido Paterno</label>
				<input type="text" name="apellidoPaterno" class="form-control" value="{{$socio->apellidoPaterno}}" placeholder="Apellido Paterno...">
			</div>

			<div class="form-group">
				<label for="apellidoMaterno">Apellido Materno</label>
				<input type="text" name="apellidoMaterno" class="form-control" value="{{$socio->apellidoMaterno}}" placeholder="Apellido Materno...">
			</div>

			<div class="form-group">
				<label for="egreso">Año Egreso</label>
				<input type="text" name="egreso" class="form-control" value="{{$socio->egreso}}" placeholder="Año...">
			</div>

			<div class="form-group">
				<label for="nombre">Vencimiento Suscripción</label>
				<input type="text" name="vencimientoSuscripcion" class="form-control" value="{{$socio->vencimientoSuscripcion}}" placeholder="año/mes/día">
			</div>

			
		
 			<div class="form-group">
 				<label for="ModalidadPago">Modalidad de Pago</label>
	 			<select name="idModalidadPago">
	                 @foreach ($modalidadpago as $modPago)
						<?php if($modPago->idModalidadPago == $socio->idModalidadPago) : ?>
		                     <option value="{{$modPago->idModalidadPago}}" selected>{{$modPago->Nombre}}</option>
						<?php else : ?>
		                     <option value="{{$modPago->idModalidadPago}}">{{$modPago->Nombre}}</option>
						<?php endif; ?>
	                 @endforeach
	             </select>	
 			</div>

			<div class="form-group">
 				<label for="carrera">Carrera</label>
	 			<select name="idCarrera">
	                 @foreach ($carrera as $car)
						<?php if($car->idCarrera == $socio->idCarrera) : ?>
		                     <option value="{{$car->idCarrera}}" selected>{{$car->Nombre}}</option>
						<?php else : ?>
		                     <option value="{{$car->idCarrera}}">{{$car->Nombre}}</option>
						<?php endif; ?>
    	             @endforeach
	             </select>	
 			</div>


			
			<div class="form-group">
 				<label for="suscripcion">Estado Suscripción</label>
	 			<select name="estadoSuscripcion">
				<?php if($socio->estadoSuscripcion == 1) : ?>
                    <option value="1" selected>Activo</option>
                    <option value="0">Inactivo</option>
				<?php else : ?>
					<option value="1">Activo</option>
                    <option value="0" selected>Inactivo</option>
				<?php endif; ?>					
	             </select>	
 			</div>

 			<div class="form-group">
 				<button class="btn btn-primary" type="submit">Guardar</button>
 				<button class="btn btn-danger" type="reset">Cancelar</button>
 			</div>             


			{!!Form::close()!!}
		</div>
	</div>
	

@endsection