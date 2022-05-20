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
            'name' => 'required',
            'address' => 'required',
            'price' => 'required',
            'description' => 'required',
            'area' => 'required',
            'juridical' => 'required',
            'unit' => 'required',
            'status' => 'required',   
            'houseDirection' => 'required',   
            'facade' => 'required',   
            'stress_width' => 'required',
            'product_category_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'product_type' => 'required',
            'sku' => 'required',
        ];
    }
    public function messages()
    {
        $messages = [
            'required' => 'Trường này là bắt buộc',
        ];
        return $messages;
    }
}
