<?php

namespace adminFudea\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocioFormRequest extends FormRequest
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
            'idCarrera'=>'required',
            'nombre'=>'required|max:20|alpha',
            'apellidoPaterno'=>'required|max:20',
            'apellidoMaterno'=>'required|max:20',
            'idModalidadPago'=>'required',
            'idUser',
            'egreso'=>'required',
            'estadoSuscripcion'=>'required',
            'vencimientoSuscripcion'=>'required'
        ];
    }
}
