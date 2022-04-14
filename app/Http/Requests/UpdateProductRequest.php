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
            'google_map' => 'required',
            'stress_width' => 'required',
            'product_category_id' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
        ];
    }
    public function messages()
    {
        $messages = [
            'name.unique' => 'Cần nhập tên',
            'address.required' => 'cần nhập địa chỉ',
            'price.required' => 'cần nhập giá ',
            'description.required' => 'cần nhập chi tiết',
            'area.required' => 'cần nhập khu vựa',
            'juridical.required' => 'cần nhập luật pháp',
            'google_map.required' => 'cần nhập luật pháp',
            'stress_width.required' => 'cần nhập chiều rộng ứng suất',
            'product_category_id.required' => 'Cần nhập danh mục sản phẩm',
            'province_id.required' => 'Cần nhập tĩnh',
            'district_id.required' => 'Cần nhập tĩnh',
            'ward_id.required' => 'cần nhập khu vực',
        ];
        return $messages;
    }
}
