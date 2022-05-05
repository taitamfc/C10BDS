<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOptionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'option_name' => 'required',
            'option_group' => 'required',
            'option_value' => 'required',
            'option_label' => 'required',
        ];
    }

    public function message() {
        return [
            'option_name.required' => 'Vui lòng nhập tên',
            'option_group.required' => 'Vui lòng nhập tên nhóm',
            'option_value.required' => 'Vui lòng nhập giá trị',
            'option_label.required' => 'Vui lòng nhập nhã nhóm',
        ];
    }
}
