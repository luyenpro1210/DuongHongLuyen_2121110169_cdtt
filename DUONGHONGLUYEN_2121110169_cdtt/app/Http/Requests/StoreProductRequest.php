<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|unique:dhl_product',
            'metakey' => 'required',
            'metadesc' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên đăng nhập bắt buộc phải nhập',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'metakey.required' => 'Từ khóa không được dể trống',
            'metadesc.required' => 'Mô tả không được dể trống',
        ];
    }
}
