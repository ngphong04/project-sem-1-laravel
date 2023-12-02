<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name,'.$this->id,
            'category_id'=>'required',
            'price'=>'required|numeric',
            'available'=>'required|numeric',
            'photo'=>'image',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Tên sản phẩm không được để trống',
            'name.unique'=>'Tên sản phẩm đã tồn tại',
            'category_id.required'=>'Danh mục không được để trống',
            'price.required'=>'Giá sản phẩm không được để trống',
            'price.numeric'=>'Giá sản phẩm phải là số',
            'available.required'=>'Số lượng không được để trống',
            'available.numeric'=>'Số lượng phải là số',
            'photo.image'=>'Vui lòng chọn đúng file ảnh',
        ];
    }
}
