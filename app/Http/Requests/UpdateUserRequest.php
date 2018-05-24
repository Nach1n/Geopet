<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'avatar' => 'image|max:1024|mimes:jpeg,png',
            'email' => 'required|email|unique:users,email,'.$this->route('user'),
            'phone-number' => 'required|integer|min:11',
            'password' => 'nullable|min:6|max:20|confirmed',
            'password_confirmation' => 'nullable|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'phone-number.min' => ' El número de teléfono debe contener al menos :min caracteres.',
        ];
    }
}
