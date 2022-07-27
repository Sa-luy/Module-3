<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [

            'name' =>'required|min:10|max:255',
            'email' =>'required|unique|email',
            'password' =>'required|confirmed|min:8|max:50',
            'phone' =>'required|min:8|max:15',
            'address' =>'required|max:255',
            // 'image' =>'required|max2048',
            'day_of_birth' =>'required',
            'role_id' =>'required'
        ];
    }
    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add('msg', 'Lỗi !!! vui lòng thử lại!');
            }
        });
    }
}
