<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'code' => 'required',
            'user_id' => 'required',
            'deliveryaddress' => 'required',
            'deliveryname' => 'required',
            'deliveryphone' => 'required',
            'deliveryemail' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Code bắt buộc phải nhập',
            'user_id.required' => 'Mã khách hàng không được dể trống',
            'deliveryaddress.required' => 'Địa chỉ người nhận không được dể trống',
            'deliveryname.required' => 'Tên người nhận không được dể trống',
            'deliveryphone.required' => 'Số điện thoại không được dể trống',
            'deliveryemail.required' => 'Email người nhận không được dể trống',
        ];
    }
}
