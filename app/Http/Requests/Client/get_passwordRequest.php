<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class get_passwordRequest extends FormRequest
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
            'password'=> 'required|min:6',
            'confirm_password'=>'required|same:password'
        ];
    }

    public function messages(){
        return[
            'password.required'=> 'Mật khẩu không được để trống',
            'password.min'=> 'Mật khẩu tối thiểu 6 kí tự',
            'confirm_password'=> 'Mật khẩu xác nhận không được để trống',
            'confirm_password.same'=> 'Mật khẩu xác nhận không đúng'
        ];
    }
}
