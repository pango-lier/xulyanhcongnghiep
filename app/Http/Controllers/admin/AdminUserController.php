<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminUser;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequestValidator;
use Illuminate\Support\Facades\Gate;
class AdminUserController extends Controller
{
    //
    public function index()
    {
    	$users=AdminUser::paginate(5);
    	return view('admin.admin_user.index',['users'=>$users]);
    }
    public function create()
    {
    	return view('admin.admin_user.create');
    }
    public function store(CreateUserRequest $request)
    {   $cUser=Gate::forUser(auth()->guard('admin_users')->user());
        if ($cUser->allows('is-supper-admin')||($cUser->allows('is-admin')&&$request->roles>1)){
    	$user=new AdminUser();
    	$user->email=$request->email;
    	$user->name=$request->name;
    	$user->password=bcrypt($request->password);
    	$user->roles=$request->roles;
    	$user->save();
    	return redirect('admin/admin_user')->with('success','Thêm tài khoản thành công .');
         }
         return redirect('admin/admin_user')->with('success','Thêm tài khoản không thành công .');
    }
    public function edit($id)
    {
    	$user=AdminUser::where('id','=',$id)->first();//find($id);
    	return view('admin.admin_user.edit',['rowUser'=>$user]);
    }
    public function update(Request $request,$id)
    {
    	$UpdateRequest=new UpdateUserRequestValidator($request,$id);
    	$validator=$UpdateRequest->validator();
    	if($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput()->with('old_password',$request->password);
            }
        $cUser=auth()->guard('admin_users')->user();
        if ($request->roles>=$cUser->roles){    
    	$user=AdminUser::find($id);
    	$user->email=$request->email;
    	$user->name=$request->name;
    	if($request->password_change=='on'){
    	$user->password=bcrypt($request->password);
    	}
    	$user->roles=$request->roles;
    	$user->save();
    	return redirect('admin/admin_user')->with('success','Sửa thông tin tài khoản thành công .');
        }
         return redirect('admin/admin_user')->with('success','Thêm tài khoản không thành công .');
    }
    public function destroy($id)
    {
    	$user=AdminUser::find($id)->delete();
    	return redirect('admin/admin_user')->with('success','Xóa tài khoản thành công .');
    }
}
