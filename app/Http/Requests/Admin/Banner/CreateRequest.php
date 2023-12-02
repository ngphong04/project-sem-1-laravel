<?php

namespace App\Http\Requests\Admin\Banner;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name'=> 'required | unique:banners',
            'photo'=>'required  | image'
        ];
    }
    public function messages(){
        return [
            'name.required'=> 'Trường này không được để trống',
            'name.unique'=> "$this->name đã tồn tại",
            'photo.required'=> 'Trường này không được để trống',
            'photo.image'=> 'Hãy chọn đúng định dạng file'
        ];
    }
}
