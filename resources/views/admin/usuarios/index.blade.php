@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">
			<h3>Listado de Socios <a href="/register"><button class="btn btn-success">Nuevo</button></a></h3>
			
		</div>

	</div>
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Id</th>
						
						<th>Nombre</th>
						<th>Tipo de Usuario</th>


						<th>Email</th>
						<th>Estado</th>
					</thead>
					@foreach ($socios as $soc)
					<tr>
						<td>{{$soc->id}}</td>
						
						<td>{{$soc->name}}</td>
						<td>    
						<?php if($soc->tipo_usuario==0): ?>
							<b style="color:green">Administrador</b>  
						<?php elseif($soc->tipo_usuario==1): ?> 
							<b style="color:blue; ">Ejecutivo</b>
						<?php elseif($soc->tipo_usuario==2): ?> 
							<b style="color:red; ">Empresa</b>	
						<?php endif; ?>  </td>

						<td>
							{{$soc->email}}
						</td>
						
						

						<td>    
						<?php if($soc->bloqueado==0): ?>
							<b style="color:green">Habilitado</b>  
						<?php elseif($soc->bloqueado==1): ?> 
							<b style="color:red; ">Bloqueado</b>
						<?php endif; ?>
					  	</td>
						

						<td>
							
							<!-- <td><a href="{{URL::action('SocioController@bloquearUsuario',$soc->id)}}"><button class="btn btn-danger">Bloquear</button></a></td> -->
							<td><a href="" data-target="#modal-delete-{{$soc->id}}" data-toggle="modal"><button class="btn btn-info">Cambiar estado</button></a></td>
						</td>

						


					</tr>
					
					@include('admin.usuarios.modal')
					@endforeach
				</table>
			</div>
			{{$socios->render()}}
		</div>
	</div>
@endSection