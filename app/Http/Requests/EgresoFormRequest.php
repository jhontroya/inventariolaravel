<?php

namespace Inventario\Http\Requests;

use Inventario\Http\Requests\Request;

class EgresoFormRequest extends Request
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
            //
            'idcliente'=>'required|numeric',
            'tipo_comprobante'=>'required|max:20',
            'num_comprobante'=>'required|min:1|digits_between: 1,5',
            'idarticulo'=>'required',
            'cantidad'=>'required|min:1',
            'precio_egreso'=>'required|min:1',
            'total_egreso'=>'required|min:1'

        ];
    }
}
