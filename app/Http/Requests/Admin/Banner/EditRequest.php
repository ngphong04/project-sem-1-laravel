<?php

namespace App\Http\Requests\Admin\Banner;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name'=>'required|unique:banners,name,'.$this->id,
            'photo'=>'image'
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Trường này không được để trống',
            'name.unique'=>'Tên banner đã tồn tại',
            'photo.image'=>'Vui lòng chọn đúng file ảnh'
        ];
    }
}
