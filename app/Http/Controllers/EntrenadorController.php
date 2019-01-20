<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;

use Inventario\Http\Requests;
use Inventario\Http\Requests\PersonaFormRequest;

use Inventario\Persona;
use Illuminate\Support\Facades\Redirect;
use DB;

class EntrenadorController extends Controller
{
  public function __construct()
{
    $this->middleware('auth');
}
public function index(Request $request)
{
    if ($request)
    {
        $query=trim($request->get('searchText'));
        $personas=DB::table('persona')->where('nombre','LIKE','%'.$query.'%')
        ->where ('tipo_persona','=','Entrenador')
        ->orwhere('num_documento','LIKE','%'.$query.'%')
        ->where ('tipo_persona','=','Entrenador')
        ->orderBy('idpersona','asc')
        ->paginate(7);
        return view('salidas.entrenador.index',["personas"=>$personas,"searchText"=>$query]);
    }
}

public function create()
{
    return view("salidas.entrenador.create");

}
public function store ( PersonaFormRequest $request)
{
    $persona=new Persona;
    $persona->tipo_persona='entrenador';
    $persona->nombre=$request->get('nombre');
    $persona->tipo_documento=$request->get('tipo_documento');
    $persona->num_documento=$request->get('num_documento');
    $persona->direccion=$request->get('direccion');
    $persona->telefono=$request->get('telefono');
    $persona->email=$request->get('email');
    $persona->save();
    return Redirect::to('salidas/entrenador');

}
public function show($id)
{
    return view("salidas.entrenador.show",["persona"=>Persona::findOrFail($id)]);
}
public function edit($id)
{
    return view("salidas.entrenador.edit",["persona"=>Persona::findOrFail($id)]);
}
public function update( PersonaFormRequest $request,$id)
  {
    $persona=Persona::findOrFail($id);
    $persona->nombre=$request->get('nombre');
    $persona->tipo_documento=$request->get('tipo_documento');
    $persona->num_documento=$request->get('num_documento');
    $persona->direccion=$request->get('direccion');
    $persona->telefono=$request->get('telefono');
    $persona->email=$request->get('email');
    $persona->update();
      return Redirect::to('salidas/entrenador');
  }
public function destroy($id)
{
    $persona=Persona::findOrFail($id);
    $persona->tipo_persona='inactivo';
    $persona->update();
    return Redirect::to('salidas/entrenador');
}
}
