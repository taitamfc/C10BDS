<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductCategoryRequest extends FormRequest
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
            'name' => 'required|unique:products,name |max:255',
            'name' => 'required|min:2|max:30',
        ];
    }
    public function messages()
    {
        $messages = [
            'name.unique' => 'Tên này đã tồn tại ',
            'name.required' => 'Cần nhập tên',
        ];
        return $messages;
    }
}
