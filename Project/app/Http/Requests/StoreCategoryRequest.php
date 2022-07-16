<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' =>'required|string|min:8'
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>' :attribute không được để trống!!!!',
            'name.string' =>':attribute sản Phẩm Là chuỗi',
            'name.min' =>' :attribute tối thiểu 8 kí tự'
        ];
    }
    public function attributes()
    {
       return[
         'name'=>'Tên Danh mục',
    ];
    }
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add('msg', 'Đã có lỗi xảy ra vui lòng kiểm tra lại!');
            }
        });
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'create_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
