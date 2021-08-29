<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'name'=>'required',
            'description'=>'required',
            'content'=>'required',
            'img_path.*'=>'mimes:jpeg,bmp,png,gif,svg|file|max:2024',//'image',
            
        ];
    }
    public function messages()
    {
        return [
            //
            'name.required'=>'Tên tin tức chưa được điền vào .',
            'description.required'=>'Tên tin tức chưa được điền vào .',
            'content.required'=>'Tên tin tức chưa được điền vào .',
            'img_path.mimes'=>'Chỉ cho phép các dịnh dạng ảnh jpeg,bmp,png,gif,svg .',  
            'img_path.max'=>'Kích thước file ảnh phải nhỏ hơn 2 Mbyte .',
                        
        ];
    }
}
