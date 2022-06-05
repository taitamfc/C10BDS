<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostImportRequest extends FormRequest
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
            'file' => 'required',
            'user_group_id' => 'required',
            'branch_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'file.required' => 'Vui lòng chọn file',
            'user_group_id.required' => 'Vui lòng nhóm nhân viên',
            'branch_id.required' => 'Vui lòng chọn chi nhánh',
        ];
    }
}
