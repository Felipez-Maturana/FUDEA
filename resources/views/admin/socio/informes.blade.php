@extends('layouts.admin')
@section('contenido')

	<div class="form-group">
	      <label class="col-xs-2 control-label">Carrera</label>
	      <div class="col-xs-7 selectContainer">
	          <select class="form-control" name="color">
	              <option value="">Elige una carrera...</option>
	              <option value="black">Black</option>
	              <option value="green">Green</option>
	              <option value="red">Red</option>
	              <option value="yellow">Yellow</option>
	              <option value="white">White</option>
	          </select>
	      </div>
	      <div class="col-xs-3">
	          <button type="submit" class="btn btn-primary">Informes por carrera</button>
	      </div>
	  </div>
	 </div>

	 <div class="col-xs-12">
	          <div class="form-group">
	              <label class="col-xs-2 control-label">Por año de egreso</label>
	              <div class="col-xs-7 selectContainer">
	                  <div class="form-group col-xs-3">
	                    <label for="usr">Desde:</label>
	                    <input type="text" class="form-control" id="usr">
	                  </div>

	                  <div class="form-group col-xs-3">
	                    <label for="usr">Hasta:</label>
	                    <input type="text" class="form-control" id="usr">
	                  </div>
	              </div>
	              <div class="col-xs-3">
	                  <button type="submit" class="btn btn-primary">Informes por año de egreso</button>
	              </div>
	          </div>
	  </div>

	<div class="col-xs-12">
	  <div class="form-group">
	      <label class="col-xs-2 control-label">Suscripción</label>
	      <div class="col-xs-7 selectContainer">
	          <select class="form-control" name="color">
	              <option value="">Activo</option>
	              <option value="black">Inactivo</option>
	          </select>
	      </div>
	      <div class="col-xs-3">
	          <button type="submit" class="btn btn-primary">Informes por Estado de Suscripción</button>
	      </div>
	  </div>
	 </div>


	          



<div class="row">
	<div class="col-md-12 col-lg-12 col-xs-12">
    	<div id="piechart"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-lg-12 col-xs-12">
 		<div id="piechartEstado"></div>
	</div>
</div>



@endsection




    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Carrera', 'Cantidad socios'],
          @foreach($carrera as $car)
          	['{{$car->Nombre}}', {{$car->num}}],
          @endforeach
        ]);

        var options = {
          title: 'Según carrera',
          is3D:true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['Socios Activos', 'Socios Inactivos'],
       	['Acticos', {{$estado[0]->num}}],
       	['Inactivos',{{$total[0]->num-$estado[0]->num}}]         
        ]);

        var options = {
          title: 'Según estado de Suscripción',
          is3D:true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechartEstado'));

        chart.draw(data, options);
      }
    </script>