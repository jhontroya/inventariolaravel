@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Crear un Nuevo Entrenador</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
</div>
</div>
			{!!Form::open(array('url'=>'salidas/entrenador','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
		<label for="nombre">Nombre</label>
		 <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
	</div>
	</div>


	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
 		<label for="direccion">Dirección</label>
 		 <input type="text" name="direccion" required value="{{old('direccion')}}" class="form-control" placeholder="Direccion del entrenador...">
 	</div>
	</div>


	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
		<label>Documento</label>
		<select class="form-control" name="tipo_documento">
			<option value="DNI">DNI</option>
			<option value="RUC">RUC</option>
			<option value="PAS">PAS</option>
		</select>
		</div>
		</div>


	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
		<label for="num_documento">Número Documentos</label>
		 <input type="number" name="num_documento"  value="{{old('num_documento')}}" class="form-control" placeholder="Numero de Documento...">
	</div>
	</div>


	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
		<label for="telefono">Teléfono</label>
		 <input type="number" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Telefono...">
	</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
	<label for="email">Correo Electrónico</label>
	 <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email...">
</div>
</div>


	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Guardar</button>
			<button class="btn btn-danger" type="reset">Cancelar</button>
			 <a href="{{ url()->previous() }}" class="btn btn-info">Regresar</a>
	</div>
</div>
</div>

	{!!Form::close()!!}
@endsection
