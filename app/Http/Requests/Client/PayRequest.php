<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required|digits:10',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'phone.required' => 'Không được để trống',
            // 'phone.numeric' => 'Hãy nhập số',
            'phone.digits' => 'Hãy nhập đúng số điện thoại',
            'address.required' => 'Không được để trống',
        ];
    }
}
