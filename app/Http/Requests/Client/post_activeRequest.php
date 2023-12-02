<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class post_activeRequest extends FormRequest
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
            'email'=>'required|exists:users'
        ];
    }

    public function messages(){
        return[
            'email.required'=>'Email không được để trống',
            'email.exists'=>'Email không tồn tại trong hệ thống'
            
        ];
    }
}
