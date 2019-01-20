<?php

namespace Inventario\Http\Requests;

use Inventario\Http\Requests\Request;

class ArticuloFormRequest extends Request
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
        'idcategoria'=>'required|numeric',
        'nombre'=>'required|max:100|alpha',
        'stock'=>'required|integer|min:0|digits_between: 1,5',
        'descripcion'=>'max:512|string',
        'imagen'=>'mimes:jpeg,png'

        ];
    }
}
