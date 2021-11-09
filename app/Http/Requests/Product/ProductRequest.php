<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:products',
            'price' => 'required',
            'description' => 'max:255',
            'quantity' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'status.required' => 'Trạng thái sản phẩm không được để trống',
            'quantity' => 'Vui lòng nhập số lượng sản phẩm',
            'price' => 'Giá sản phẩm không được để trống',
            'description' => 'Mô tả sản phẩm chỉ giới hạn 255 ký tự'
        ];
    }
}
