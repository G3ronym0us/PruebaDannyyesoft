<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:45'],
            'email' => ['required', 'string', 'email', 'max:45', 'unique:users'],
            'S_Nombre' => ['string', 'max:45'],
            'S_Apellido' => ['string', 'max:45'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }
}
