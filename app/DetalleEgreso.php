<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class DetalleEgreso extends Model
{
    //
    protected $table='detalle_egreso';

  protected $primaryKey='iddetalle_egreso';

  public $timestamps=false;

  protected $fillable =[
    'idegreso',
    'idarticulo',
    'cantidad',
    'precio_egreso'
  ];
}
