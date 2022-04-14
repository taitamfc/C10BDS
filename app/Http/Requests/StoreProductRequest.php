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
            'name.required' => 'Trường tên là bắt buộc',
            'address.required' => 'Trường địa chỉ là bắt buộc.',
            'price.required' => 'Trường giá là bắt buộc',
            'description.required' => 'Trường mô tả là bắt buộc',
            'area.required' => 'Trường khu vựa là bắt buộc',
            'juridical.required' => 'Trường luật pháp là bắt buộc',
            'google_map.required' => 'Trường bản đồ google là bắt buộc',
            'stress_width.required' => 'Trường độ rộng ứng suất là bắt buộc',
            'product_category_id.required' => 'Trường danh mục sản phẩm là bắt buộc',
            'province_id.required' => 'Trường nhập tỉnh là bắt buộc',
            'district_id.required' => 'Trường nhập quận là bắt buộc',
            'ward_id.required' => 'Trường nhập khu vực là bắt buộc',
        ];
        return $messages;
    }
}
