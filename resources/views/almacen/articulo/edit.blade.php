@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Artículo: {{ $articulo->nombre}}</h3>
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

			{!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
            {{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
					<label for="nombre">Nombre</label>
					 <input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control">
				</div>
				</div>

			 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			 <div class="form-group">
			 	<label >Categoría</label>
				<select name="idcategoria" class="form-control">
					@foreach ($categorias as $cat)
					@if ($cat->idcategoria==$articulo->idcategoria)
			    <option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
					@else
  <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
					@endif
					@endforeach
				</select>
			 </div>
			</div>


				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
					<label for="stock">Stock</label>
					 <input type="number" name="stock" required value="{{$articulo->stock}}" class="form-control">
				</div>
				</div>


				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
					<label for="descripcion">Descripción</label>
					 <input type="text" name="descripcion"  value="{{$articulo->descripcion}}" class="form-control" placeholder="descripcion del articulo...">
				</div>
				</div>


				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
					<label for="imagen">Imagen</label>
					 <input type="file" name="imagen" class="form-control">
					 @if(($articulo->imagen)!="")
          <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="200px" width="200px">
					 @endif
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
@endsection
