<?php

namespace Inventario\Http\Requests;

use Inventario\Http\Requests\Request;

class PersonaFormRequest extends Request
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
'nombre'=>'required|max:100|alpha',
'tipo_documento'=>'required|max:20',
'num_documento'=>'required|integer|min:1|digits_between: 1,5',
'direccion'=>'max:70|string',
'telefono'=>'min:7',
'email'=>'max:50|email|unique:persona'

        ];
    }
}
