<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => 'required|unique:dhl_contact',
            'email' => 'required',
            'phone' => 'required',
            'title' => 'required',
            'detail' => 'required',
            'replaydetail' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên đăng nhập bắt buộc phải nhập',
            'name.unique' => 'Tên đã tồn tại',
            'email.required' => 'Email không được dể trống',
            'phone.required' => 'Số điện thoại không được dể trống',
            'title.required' => 'Tiêu đề không được dể trống',
            'detail.required' => 'Chi tiết không được dể trống',
            'replaydetail.required' => 'Nội dung chi tiết không được dể trống',
        ];
    }
}
