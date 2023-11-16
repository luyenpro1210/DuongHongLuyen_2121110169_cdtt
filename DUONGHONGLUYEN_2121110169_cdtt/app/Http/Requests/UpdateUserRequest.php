<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục bắt buộc phải nhập',
            'username.required' => 'Tên tài khoản không được dể trống',
            'password.required' => 'Mật khẩu không được dể trống',
            'email.required' => 'Email không được dể trống',
            'phone.required' => 'Số điện thoại không được dể trống',
            'address.required' => 'Địa chỉ không được dể trống',        ];
    }
}
