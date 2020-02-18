<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PuntoRequest extends FormRequest
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
            'ciudad'        => 'required|numeric|integer|min:1',
            'nombre'        => 'required|min:1|max:60',
            'descripcion'   => 'required|min:1|max:900',
            'leyenda'       => 'required|min:1|max:2000',
            'telefono'      => 'required|numeric|integer|min:1',
            'longitud'      => 'required',
            'latitud'       => 'required',
            'coste'         => 'required|numeric|integer|min:1',
            'horario'       => 'required|numeric|integer|min:1',
            'tipo'          => 'required|numeric|integer|min:1',
            'puntos'        => 'required|numeric|integer|min:0',
        ];
    }
}
