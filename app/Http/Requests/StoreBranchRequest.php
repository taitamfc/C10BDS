<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
     * Get the Validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập chi nhánh',
            'address.required' => 'Vui lòng nhập địa chỉ chi nhánh',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'province_id.required' => 'Vui lòng nhập id tỉnh',
            'district_id.required' => 'Vui lòng nhập id quận huyện',
            'ward_id.required' => 'Vui lòng nhập id xã',
            'user_id.required' => 'Vui lòng nhập id người dùng',
        ];
    }

}
