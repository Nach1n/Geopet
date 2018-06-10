<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
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
            'name' => 'required|string',
            //'birth_day' => 'date',
            'specie' => 'string',
            'race' => 'string',
            'sex' => 'required|boolean',
            'color' => 'string',
            'reproductive_status' => 'boolean',
            'description' => 'string|max:600',
        ];
    }
}
