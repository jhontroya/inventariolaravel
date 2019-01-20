<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;

use Inventario\Http\Requests;
use Inventario\Categoria;
use Illuminate\Support\Facades\Redirect;
use Inventario\Http\Requests\CategoriaFormRequest;
use DB;


class CategoriaController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth');
    }

    //metodo index para mostrar o listar nuestros datos de la BD
    public function index(Request $request)
    {
        if ($request)
        {
          //trim para quitar espacios al inicio y final
            $query=trim($request->get('searchText'));
            $categorias=DB::table('categoria')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orwhere('idcategoria','LIKE','%'.$query.'%')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

  //metodo para retornar o crear nuestras vistas
    public function create()
    {
        return view("almacen.categoria.create");
    }

    //metodo que almacena el objeto del modelo categoria en nuestra tabla categoria de la BD
    public function store (CategoriaFormRequest $request)
    {
        $categoria=new Categoria; //hace referencia al modelo categoria
        $categoria->nombre=$request->get('nombre'); //enviamos los valores
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='1';
        $categoria->save(); //almacenmaos en la base de datos
        return Redirect::to('almacen/categoria'); //redireccionamos al listado de las categorias

    }

      //metodo para retornar una vista, en este caso categoria
    public function show($id)
    {
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]); //la funcion findOrFail permite mostrar la categoria especifica
    }

      //metodo para llamar a un formulario y modificar los datos de una categoria especifica
    public function edit($id)
    {
        return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

    //metodo para actualizar mis datos del formulario
    public function update(CategoriaFormRequest $request,$id) //recibe 2 parametros el request,id
    {
        $categoria=Categoria::findOrFail($id); //recibe como parametros el id
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update(); //llamamos al metodo update
        return Redirect::to('almacen/categoria'); //redireccionamos a nuestra vista categoria
    }

    //metodo para eliminar mis datos del formulario
    public function destroy($id) //recibe como parametros el id
    {
        $categoria=Categoria::findOrFail($id); 
        $categoria->condicion='0';
        $categoria->delete();
        return Redirect::to('almacen/categoria'); //redireccionamos a nuestra vista categoria
    }

}
