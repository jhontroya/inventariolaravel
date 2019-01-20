@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Crear  un Nuevo Egreso <a href="egreso/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('salidas.egreso.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
						<h3><b>LISTADO DE EGRESOS</b></h3><br>
				<thead  style="background-color:#73C6BB">
					<th>Fecha</th>
					<th>Entrenador</th>
					<th>Comprobante</th>
					<th>Impuesto</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($egresos as $eg)
				<tr>
					<td>{{ $eg->fecha_hora}}</td>
					<td>{{ $eg->nombre}}</td>
					<td>{{ $eg->tipo_comprobante.': '.$eg->num_comprobante}}</td>
					<td>{{ $eg->impuesto}}</td>
					<td>{{ $eg->total_egreso}}</td>
					<td>{{ $eg->estado}}</td>

					<td>
						<a href="{{URL::action('EgresoController@show',$eg->idegreso)}}"><button class="btn btn-primary">Detalles</button></a>
                         <a href="" data-target="#modal-delete-{{$eg->idegreso}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
				@include('salidas.egreso.modal')
				@endforeach
			</table>
		</div>
		{{$egresos->render()}}
	</div>
</div>

@endsection
