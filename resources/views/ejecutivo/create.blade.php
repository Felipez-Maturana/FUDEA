@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Socio</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger"> 
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'ejecutivo','method'=>'POST','autocomplete','off'))!!}
			{{Form::token()}}

			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
			</div>

			
			<div class="form-group">
				<label for="apellidoPaterno">Apellido Paterno</label>
				<input type="text" name="apellidoPaterno" class="form-control" placeholder="Apellido Paterno...">
			</div>

			<div class="form-group">
				<label for="apellidoMaterno">Apellido Materno</label>
				<input type="text" name="apellidoMaterno" class="form-control" placeholder="Apellido Materno...">
			</div>

			<div class="form-group">
				<label for="run">RUN</label>
				<input type="numeric" pattern="^[0-9]{1,}$" maxlength="8" name="run" class="form-control" placeholder="18971431">
			</div>

			<div class="form-group">
				<label for="egreso">Año Egreso</label>
				<input type="text" pattern="^[0-9]{1,}$" maxlength="4" name="egreso" class="form-control" placeholder="Año...">
			</div>

			<div class="form-group">
				<label for="nombre">Vencimiento Suscripción</label>
				<input type="date" name="vencimientoSuscripcion" class="form-control" placeholder="año/mes/día">
			</div>



<!-- 
			<div class="input-group date" data-provide="datepicker">
			    <input type="text" class="form-control">
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div> -->

				<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
				


<!-- 			<script>
				$('.datepicker').datepicker({
				    format: 'mm/dd/yyyy',
				    startDate: '-3d'
				});
			</script> -->

				


















			
		
 			<div class="form-group">
 				<label for="ModalidadPago">Modalidad de Pago</label>
	 			<select name="idModalidadPago">
	                 @foreach ($modalidadpago as $modPago)
	                     <option value="{{$modPago->idModalidadPago}}">{{$modPago->Nombre}}</option>
	                 @endforeach
	             </select>	
 			</div>

			<div class="form-group">
 				<label for="carrera">Carrera</label>
	 			<select name="idCarrera">
	                 @foreach ($carrera as $car)
	                     <option value="{{$car->idCarrera}}">{{$car->Nombre}}</option>
	                 @endforeach
	             </select>	
 			</div>


			
			<div class="form-group">
 				<label for="suscripcion">Estado Suscripción</label>
	 			<select name="estadoSuscripcion">
					<option value="1">Activo</option>
					<option value="0">Inactivo</option>
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