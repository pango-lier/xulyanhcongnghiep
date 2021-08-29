<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class UpdateUserRequestValidator 
{
    private $rules;
    private $request;
    private $messages;
    public function __construct(Request $request,$id)
    {       $this->request=$request;
            $this->rules=[
            'email'=>'bail|email|string|max:255|unique:admin_users,email,'.$id,
            ];
        $this->messages= [
            'email.required'=>'Vui lòng email đăng nhập',   
            'email.unique'=>"Email này đã tồn tại.",
            'email.email'=>"Email không chính xác .",
                ];
        if($request->password_change=='on'){
            $this->rules['password']='required|min:1|max:30';
            $this->rules['password_confirm']='required|same:password';

            $this->messages['password.required']='Vui lòng điền mật khẩu đăng nhập .';
            $this->messages['password.min']='Mật khẩu từ 1-30 kí tự .';
            $this->messages['password.max']='Mật khẩu từ 1-30 kí tự .';
            $this->messages['password_confirm.required']='Vui lòng nhập mật khẩu xác nhận .';
            $this->messages['password_confirm.same']='Mật khẩu xác nhận không trùng khớp .';
            
        }
      //  $validator=  $req->validate($rules,$messages);
        
    }
     public function validator()
    {
        return Validator::make($this->request->all(),$this->rules,$this->messages);
    }
    /*
    static public function validate(Request $req,$id)
    {
        $rules=[
            'username'=>'bail|min:1|max:30|string|required|unique:users,username,'.$id,
            'email'=>'bail|email|string|max:255',
            ];
        $messages= [
            'username.unique'=>"Tên đăng nhập này đã tồn tại.",
            'username.required'=>'Vui lòng nhập tên đăng nhập .',
            'username.min'=>'Tên đăng nhập từ 1-30 kí tự .',
            'username.max'=>'Ten đăng nhập từ 1-30 kí tự .',
            'email.required'=>'Vui lòng email đăng nhập',   
            'email.unique'=>"Email này đã tồn tại.",
            'email.email'=>"Email không chính xác .",
                ];
        if($req->password_change=='on'){
            $rules['password']='required|min:1|max:30';
            $rules['password_confirm']='required|same:password';

            $messages['password.required']='Vui lòng điền mật khẩu đăng nhập .';
            $messages['password.min']='Mật khẩu từ 1-30 kí tự .';
            $messages['password.max']='Mật khẩu từ 1-30 kí tự .';
            $messages['password_confirm.required']='Vui lòng nhập mật khẩu xác nhận .';
            $messages['password_confirm.same']='Mật khẩu xác nhận không trùng khớp .';

        }
        $req->validate($rules,$messages);
    }
    */
}
/*
            
*/
