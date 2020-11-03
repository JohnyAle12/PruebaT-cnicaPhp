<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'bith_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido.',
            'email.required' => 'El campo correo electrónico es requerido.',
            'address.required' => 'El campo dirección es requerido.',
            'gender.required' => 'El campo genero es requerido.',
            'bith_date.required' => 'El campo fecha de nacimientos es requerido.'
        ];
    }
}
