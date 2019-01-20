<?php

namespace Inventario\Http\Controllers;

use Illuminate\Http\Request;

use Inventario\Http\Requests;
use Inventario\Http\Requests\EgresoFormRequest;

use Inventario\Egreso;
use Inventario\DetalleEgreso;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class EgresoController extends Controller
{
    //
    public function __construct()
  {
     $this->middleware('auth');
  }
  public function index(Request $request)
  {
      if ($request)
      {
  $query=trim($request->get('searchText'));
  $egresos=DB::table('egreso as e')
  ->join('persona as p','e.idcliente','=','p.idpersona')
  ->join ('detalle_egreso as de','e.idegreso','=','de.idegreso')
  ->select('e.idegreso','e.fecha_hora','p.nombre','e.tipo_comprobante','e.num_comprobante','e.impuesto','e.estado','e.total_egreso')
  ->where('e.num_comprobante','LIKE','%'.$query.'%')
  ->orwhere('p.nombre','LIKE','%'.$query.'%')
  ->orderBy('e.idegreso','desc')
->groupBY('e.idegreso','e.fecha_hora','p.nombre','e.tipo_comprobante','e.num_comprobante','e.impuesto','e.estado')
  ->paginate(7);
  return view('salidas.egreso.index',["egresos"=>$egresos,"searchText"=>$query]);

      }
  }

  public function create(){

  $personas=DB::table('persona')->where('tipo_persona','=','Entrenador')->get();
  $articulos=DB::table('articulo as art')
  ->join('detalle_ingreso as di','art.idarticulo','=','di.idarticulo')
  ->select(DB::raw('CONCAT(art.nombre) As articulo'),'art.idarticulo','art.stock',DB::raw('avg(di.precio_egreso) as precio_promedio'))
  ->where('art.estado','=','Activo')
  ->where('art.stock','>','0')
  ->groupBY('articulo','art.idarticulo','art.stock')
  ->get();
  return view("salidas.egreso.create",["personas"=>$personas,"articulos"=>$articulos]);
  }

  public function store(EgresoFormRequest $request){

  try{
  DB::beginTransaction();
  $egreso=new Egreso;
  $egreso->idcliente=$request->get('idcliente');
  $egreso->tipo_comprobante=$request->get('tipo_comprobante');
  $egreso->num_comprobante=$request->get('num_comprobante');
  $egreso->total_egreso=$request->get('total_egreso');

  $mytime= Carbon::now('America/Guayaquil');
  $egreso->fecha_hora=$mytime->toDateTimeString();
  $egreso->impuesto='12';
  $egreso->estado='A';
  $egreso->save();

  $idarticulo=$request->get('idarticulo');
  $cantidad=$request->get('cantidad');
  $precio_egreso=$request->get('precio_egreso');

  $cont=0;

  while($cont < count($idarticulo)){
    $detalle=new DetalleEgreso();
    $detalle->idegreso=$egreso->idegreso;
    $detalle->idarticulo=$idarticulo[$cont];
    $detalle->cantidad=$cantidad[$cont];
    $detalle->precio_egreso=$precio_egreso[$cont];
    $detalle->save();
    $cont=$cont+1;
  }

    DB::commit();

  }catch(\Exception $e){
  DB::rollback();
  }
  return Redirect::to('salidas/egreso');
  }

  public function show($id){

  $egreso=DB::table('egreso as e')
  ->join('persona as p','e.idcliente','=','p.idpersona')
  ->join ('detalle_egreso as de','e.idegreso','=','de.idegreso')
  ->select('e.idegreso','e.fecha_hora','p.nombre','e.tipo_comprobante','e.num_comprobante','e.impuesto','e.estado','e.total_egreso')
  ->where('e.idegreso','=',$id)
  ->first();

  $detalles=DB::table('detalle_egreso as d')
  ->join('articulo as a','d.idarticulo','=','a.idarticulo')
  ->select('a.nombre as articulo','d.cantidad','d.precio_egreso')
  ->where('d.idegreso','=',$id)
  ->get();
  return view("salidas.egreso.show",["egreso"=>$egreso,"detalles"=>$detalles]);
  }

  public function destroy($id){

  $egreso=Egreso::findOrFail($id);
  $egreso->Estado='I';
  $egreso->delete();
  return Redirect::to('salidas/egreso');
  }
}
