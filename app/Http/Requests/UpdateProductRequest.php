<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array $messages
     * 
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
            'branch_id' => 'required',
            'linkYoutube' => 'required',
            'user_id' => 'required',
            'google_map' => 'required',
            'stress_width' => 'required',
            'product_category_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'product_type' => 'required'
        ];
    }
    public function messages()
    {
        $messages = [
            'name.required' => 'Trường này là bắt buộc',
            'address.required' => 'Trường này là bắt buộc',
            'price.required' => 'Trường này là bắt buộc',
            'description.required' => 'Trường này là bắt buộc',
            'area.required' => 'Trường này là bắt buộc',
            'juridical.required' => 'Trường này là bắt buộc',
            'status.required' => 'Trường này là bắt buộc',
            'houseDirection.required' => 'Trường này là bắt buộc',
            'facade.required' => 'Trường này là bắt buộc',
            'branch_id.required' => 'Trường này là bắt buộc',
            'linkYoutube.required' => 'Trường này là bắt buộc',
            'user_id.required' => 'Trường này là bắt buộc',
            'google_map.required' => 'Trường này là bắt buộc',
            'stress_width.required' => 'Trường này là bắt buộc',
            'product_category_id.required' => 'Trường này là bắt buộc',
            'ward_id.required' => 'Trường này là bắt buộc',
            'province_id.required' => 'Trường này là bắt buộc',
            'district_id.required' => 'Trường này là bắt buộc',
            'product_type.required' => 'Trường này là bắt buộc'
        ];
        return $messages;
    }
}
