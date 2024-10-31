<?php

namespace tecno\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntradaRequest extends FormRequest
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
            'nombre'=>'required',
         'cc'=>'required',
         'telefono'=>'required',
         'articulo'=>'required',
         'marca'=>'required',
         'modelo'=>'required',
         'serial'=>'required',
         'problema'=>'required',
         'notas'=>'required',
         'estado'=>'required'
        ];
    }
}
