<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->route('user'),
            'phone-number' => 'required|numeric|min:11',
            'rol' => 'required|digits:1,2',
            'password' => 'required|min:6|max:20|confirmed',
        ];
    }
    
    public function messages()
    {
        return [
            'lastname.required' => 'El campo apellido es obligatorio.',
            'phone-number.min' => 'El número de teléfono debe contener al menos :min caracteres.',
            'phone-number.required' => 'El número de teléfono es obligatorio.'
        ];
    }
}