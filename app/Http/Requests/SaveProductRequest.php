<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Product;

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
    public function rules($id)
    {
        return [
                'id' => 'required',
                'category_id' => 'required',
                'common_name' => 'required|unique:App\Product,common_name,'.$id,
                'scientific_name' => 'required|unique:App\Product,scientific_name,'.$id,
                'cost' => 'required|Integer|min:0',
                'stock' => 'required|Integer|min:0',
                'use' => 'required',
                'image' => 'required'
        ];
    }
}
