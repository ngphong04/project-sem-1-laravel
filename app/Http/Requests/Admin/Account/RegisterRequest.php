<?php

namespace App\Http\Requests\Admin\Account;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fullName'=>'required',
            'email'=>'required|email|unique:users',
            'password'=> 'required|min:6',
            'confirm_password'=>'required|same:password'
        ];
    }

    public function messages(){
        return[
            'fullName.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'email.email'=>'Hãy nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=> 'Mật khẩu không được để trống',
            'password.min'=> 'Mật khẩu tối thiểu 6 kí tự',
            'confirm_password'=> 'Mật khẩu xác nhận không được để trống',
            'confirm_password.same'=> 'Mật khẩu xác nhận không đúng'
        ];
    }
}
