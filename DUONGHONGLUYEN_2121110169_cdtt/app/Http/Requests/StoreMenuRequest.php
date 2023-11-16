<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
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
            'name' => 'required|unique:dhl_menu',
            'link' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên đăng nhập bắt buộc phải nhập',
            'name.unique' => 'Tên menu đã tồn tại',
            'link.required' => 'Liên kết không được dể trống',
        ];
    }
}
