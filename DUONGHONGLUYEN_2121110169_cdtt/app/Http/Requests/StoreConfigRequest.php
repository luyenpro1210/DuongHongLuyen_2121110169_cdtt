<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConfigRequest extends FormRequest
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
            'author' => 'required|unique:dhl_config',
            'site_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'author.required' => 'Tên tác giả bắt buộc phải nhập',
            'author.unique' => 'Tên tác giả đã tồn tại',
            'site_name' => 'Tên địa điểm không được dể trống',
            'email.required' => 'Email không được dể trống',
            'phone.required' => 'Số điện thoại không được dể trống',
            'metakey.required' => 'Từ khóa không được dể trống',
            'metadesc.required' => 'Mô tả không được dể trống',
        ];
    }
}
