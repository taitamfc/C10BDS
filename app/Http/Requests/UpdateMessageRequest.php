<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ' Vui lòng nhập tiêu đề tin nhắn',
            'content.required' => ' Vui lòng nhập nội dung tin nhắn',
            'type.required' => ' Vui lòng nhập kiểu tin nhắn',
            'status.required' => ' Vui lòng nhập tiêu trạng thái',
        ];
    }
}
