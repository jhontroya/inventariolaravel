<?php

namespace Inventario\Http\Requests;

use Inventario\Http\Requests\Request;

class IngresoFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idproveedor'=>'required|numeric',
            'tipo_comprobante'=>'required|max:20',
            'num_comprobante'=>'required|min:1|max:10',
            'idarticulo'=>'required',
            'cantidad'=>'required|min:1',
            'precio_compra'=>'required|min:1',
            'precio_egreso'=>'required|min:1'

        ];
    }
}
