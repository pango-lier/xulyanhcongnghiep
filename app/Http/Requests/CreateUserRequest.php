<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            //
            'email'=>'bail|required|email|string|unique:admin_users,email|max:255',
            'password'=>'bail|min:1|required|max:30',
            'password_confirm'=>'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            //
            'password.required'=>'Vui lòng điền mật khẩu đăng nhập .',
            'password.min'=>'Mật khẩu từ 1-30 kí tự .',
            'password.max'=>'Mật khẩu từ 1-30 kí tự .',
            'password_confirm.required'=>'Vui lòng nhập mật khẩu xác nhận .',
            'password_confirm.same'=>'Mật khẩu xác nhận không trùng khớp .',
            'email.required'=>'Vui lòng email đăng nhập',   
            'email.unique'=>"Email này đã tồn tại.",
            'email.email'=>"Email không chính xác .",
        ];
    }
}
