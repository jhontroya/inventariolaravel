@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group">
		<label for="proveedor">Proveedor</label>
	<p>{{$ingreso->nombre}}</p>
	</div>
	</div>




	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
		<div class="form-group">
		<label>Tipo Comprobante</label>
	<p>{{$ingreso->tipo_comprobante}}</p>
		</div>
		</div>



	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
		<div class="form-group">
		<label for="num_comprobante">Número Comprobante</label>
		<p>{{$ingreso->num_comprobante}}</p>
	</div>
	</div>
	</div>

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">


				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
<thead style="background-color:#00FF00">
	<th>Artículo</th>
	<th>Cantidad</th>
	<th>Precio Compra</th>
	<th>Precio Egreso</th>
	<th>Subtotal</th>
</thead>
<tfoot>

<th></th>
<th></th>
<th></th>
<th></th>
<th><h4 id="total">$ {{$ingreso->total}}</h4></th>
</tfoot>

<tbody>
@foreach($detalles as $det)
<tr>
	<td>{{$det->articulo}}</td>
		<td>{{$det->cantidad}}</td>
			<td>{{$det->precio_compra}}</td>
				<td>{{$det->cantidad*$det->precio_compra}}</td>
</tr>

@endforeach
</tbody>
</table>
</div>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<a href="{{ url()->previous() }}" class="btn btn-info">Regresar</a>
</div>
</div>
</div>
</div>

@endsection
