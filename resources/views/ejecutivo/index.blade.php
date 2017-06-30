@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Socios <a href="/ejecutivo/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('ejecutivo.search')
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-2">
		{{Form::open(['action' => 'EjecutivoController@actualizarEstado']) }}
			<a href="{{action('EjecutivoController@actualizarEstado')}}"> <button class="btn btn-success">Actualizar Suscripción</button></a>
		{{Form::close() }}

		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>

						<th>Método de Pago</th>
						<th>IdCarrera</th>
						<!-- <th>IdSocio</th> -->
						<th>Egreso</th>
						<th>EstadoSuscripcion</th>
						<th>VencimientoSuscripcion</th>
						
						<th>Opciones</th>
						
						<!--'idCarrera',
					    	'idModalidadPago',
					    	'idUser',
					    	'egreso',
					    	'estadoSuscripcion',
					    	'nombre',
					    	'apellidoMaterno',
					    	'apellidoPaterno',
					    	'vencimientoSuscripcion'-->
					</thead>
					@foreach ($socios as $soc)
					<tr>
						<td>{{$soc->idSocio}}</td>
						
						<td>{{$soc->nombre}}</td>
						<td>{{$soc->apellidoMaterno}}</td>
						<td>{{$soc->apellidoPaterno}}</td>
						

						<td>{{ $modalidadpago[$soc->idModalidadPago-1]->Nombre}}</td>

						<td>{{$carrera[$soc->idCarrera-1]->Nombre}}</td>
						<!-- <td>{{$soc->idUser}}</td> -->
						<td>{{$soc->egreso}}</td>
						<!-- <td>   {{ $soc->estadoSuscripcion }}  </td> -->
						<td>    
						<?php if($soc->estadoSuscripcion==1) : ?>
							<b style="color:green">Activo</b>  
						<?php else : ?> 
							<b style="color:red">Inactivo</b>
						<?php endif; ?>  </td>

						<td>{{$soc->vencimientoSuscripcion}}</td>
						<td><a href="{{URL::action('EjecutivoController@edit',$soc->idSocio)}}"><button class="btn btn-info">Editar</button></a></td>
						<td><a href="" data-target="#modal-delete-{{$soc->idSocio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
					</tr>
					@include('ejecutivo.modal')
					@endforeach
				</table>
			</div>
			{{$socios->render()}}
		</div>
	</div>
@endSection