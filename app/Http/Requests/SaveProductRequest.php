<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
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
            'category_id' => 'required',
            'common_name' => 'required|unique:App\Product,common_name',
            'scientific_name' => 'required|unique:App\Product,scientific_name',
            'cost' => 'required|Integer|min:0',
            'stock' => 'required|Integer|min:0',
            'use' => 'required',
            'image' => 'requiered'
        ];
    }
}
