<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    //
    protected $table='egreso';

  protected $primaryKey='idegreso';

  public $timestamps=false;

  protected $fillable =[
  'idcliente',
  'tipo_comprobante',
  'num_comprobante',
  'fecha_hora',
  'impuesto',
  'total_egreso',
  'estado'
  ];
}
