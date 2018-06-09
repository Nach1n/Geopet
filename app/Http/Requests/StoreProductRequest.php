<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'brand_name' => 'required|string|max:120',
            'model_name' => 'required|string|max:120',
            'network' => 'nullable',
            'cpu' => 'nullable',
            'battery' => 'required|string|max:120',
            'battery_life' => 'required|integer',
            'car_charger' => 'nullable',
            'wall_charger' => 'nullable',
            'certificate' => 'nullable',
            'item_size' => 'required|string|max:120',
            'weight' => 'required|integer',
            'comunication_protocol' => 'required|string|max:120',
            'band' => 'required|string|max:120',
            'gps_module' => 'nullable',
            'gps_chip' => 'nullable',
            'gps_accuracy' => 'required|integer',
            'standby' => 'required|integer',
            'operation_temp' => 'nullable',
            'price' => 'required|numeric',
            'published' => 'required|boolean',
        ];
    }
}
