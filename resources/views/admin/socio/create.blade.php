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

			{!!Form::open(array('url'=>'admin/socio','method'=>'POST','autocomplete','off'))!!}
			{{Form::token()}}

			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="apellidoPaterno">Apellido Paterno</label>
						<input type="text" name="apellidoPaterno" class="form-control" placeholder="Apellido Paterno...">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="apellidoMaterno">Apellido Materno</label>
						<input type="text" name="apellidoMaterno" class="form-control" placeholder="Apellido Materno...">
					</div>	
				</div>
			</div>

			<!-- <div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="email">Apellido Paterno</label>
						<input type="text" name="email" class="form-control" placeholder="Email...">
					</div>
				</div>
			</div> -->


			<div class="form-group">
				<label for="run">RUN</label>
				<input type="numeric" pattern="^[0-9]{1,}$" maxlength="8" name="run" class="form-control" placeholder="18971431">
			</div>
			
			<div class="row">
					
				<div class="col-md-6">
					<div class="form-group">
						<label for="egreso">Año Egreso</label>
						<input type="text" pattern="^[0-9]{1,}$" maxlength="4" name="egreso" class="form-control" placeholder="Año...">
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label for="nombre">Vencimiento Suscripción</label>
						<input type="date" name="vencimientoSuscripcion" class="form-control" placeholder="año/mes/día">
					</div>		
				</div>


			</div>

		
					
		
 			<div class="row">
				<div class="col-md-6">
		 			<div class="form-group">
		 				<label for="ModalidadPago">Modalidad de Pago</label>
			 			<select name="idModalidadPago">
			                 @foreach ($modalidadpago as $modPago)
			                     <option value="{{$modPago->idModalidadPago}}">{{$modPago->Nombre}}</option>
			                 @endforeach
			             </select>	
		 			</div>
				</div>

				<div class="col-md-6">
	 			<div class="form-group">
	 				<label for="sexo">Sexo</label>
		 			<select name="sexo">
						<option value="1">Femenino</option>
						<option value="0">Masculino</option>
		             </select>	
	 			</div>
				</div>
			</div>
				

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
		 				<label for="carrera">Carrera</label>
			 			<select name="idCarrera">
			                 @foreach ($carrera as $car)
			                     <option value="{{$car->idCarrera}}">{{$car->Nombre}}</option>
			                 @endforeach
			             </select>	
		 			</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
		 				<label for="suscripcion">Estado Suscripción</label>
			 			<select name="estadoSuscripcion">
							<option value="1">Activo</option>
							<option value="0">Inactivo</option>
			             </select>	
		 			</div>
				</div>

			</div>

 			<div class="form-group">
 				<button class="btn btn-primary" type="submit">Guardar</button>
 				<button class="btn btn-danger" type="reset">Cancelar</button>
 			</div>             


			{!!Form::close()!!}
		</div>
	</div>
	

@endsection