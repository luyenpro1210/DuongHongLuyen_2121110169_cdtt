<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
            'link' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên đăng nhập bắt buộc phải nhập',
            'link.required' => 'Liên kết không được dể trống',
        ];
    }
}
