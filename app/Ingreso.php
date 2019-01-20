<?php

namespace Inventario;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
  protected $table='ingreso';

protected $primaryKey='idingreso';

public $timestamps=false;

protected $fillable =[
'idproveedor',
'tipo_comprobante',
'num_comprobante',
'fecha_hora',
'impuesto',
'estado'
];
}
