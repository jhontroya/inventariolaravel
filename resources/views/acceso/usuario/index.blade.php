@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<h3>Crear un Nuevo Usuario	<a href="usuario/create"><button class="btn btn-success">Nuevo</button></a><br><br></h3>
		@include('acceso.usuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<h3><b>LISTADO DE USUARIOS</b></h3><br>
				<thead  style="background-color:#73C6BB">
					<th>Id</th>
					<th>Nombre</th>
					<th>Correo Electrónico</th>
					<th>Opciones</th>
				</thead>
               @foreach ($usuarios as $usu)
				<tr>
					<td>{{ $usu->id}}</td>
					<td>{{ $usu->name}}</td>
					<td>{{ $usu->email}}</td>
					<td>
						<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('acceso.usuario.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection
