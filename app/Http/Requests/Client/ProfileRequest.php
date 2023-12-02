<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'phone_number'=>'required|numeric|unique:users,phone_number,'.$this->id,
            'address' => 'required',
            'photo'=>'image'
        ];
    }
    public function messages(){
        return [
            'fullName.required'=> 'Trường này không được để trống',
            'phone_number.required'=> 'Trường này không được để trống',
            'phone_number.numeric'=> 'Hãy nhập đúng định dạng',
            'phone_number.unique'=> 'Số điện thoại đã tồn tại',
            'address.required'=> 'Trường này không được để trống',
            'photo.image'=>'Hãy chọn đúng định dạng ảnh'
        ];
    }
}
