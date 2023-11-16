<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required',
            'detail' => 'required',
            'metakey' => 'required',
            'metadesc' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tên đăng nhập bắt buộc phải nhập',
            'detail.required' => 'Chi tiết không được dể trống',
            'metakey.required' => 'Từ khóa không được dể trống',
            'metadesc.required' => 'Mô tả không được dể trống',
        ];
    }
}
