<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name'    => 'required',
            'email'   => 'required',
            'address' => 'required',
            'phone'   => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => 'Vui lòng nhập chi nhánh',
            'email.required'  => 'Vui lòng nhập email',
            'address.required'=> 'Vui lòng nhập địa chỉ chi nhánh',
            'phone.required'  => 'Vui lòng nhập số điện thoại',
        ];
    }
}
