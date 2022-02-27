<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Cart;
use App\Bill;
use Ap\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function home()
    {
        // 	if (Gate::forUser(auth()->guard('admin_users')->user())->allows('is-admin')) {
        // The current user can view all users...
        //		return redirect('admin/category');
        //}
        $bills = Bill::latest()->paginate(15);
        return view('admin.index', ['bills' => $bills]);
    }
    public function getLogin()
    {
        // dd(bcrypt('1'));
        if (auth()->guard('admin_users')->check()) return redirect('admin/home');
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $user =
            [
                'email' => $request->email,
                'password' => $request->password,
            ];
        $remember = $request->remember_me == 'on' ? true : false;
        //dd($user);
        if (auth()->guard('admin_users')->attempt($user, $remember)) {
            return redirect('admin/home');
        }
        return redirect('admin/login')->with('login_error', 'Tên đăng nhập hoặc mật khẩu không chính xác !.');
    }
    public function getLogout()
    {
        auth()->guard('admin_users')->logout();
        return redirect('admin/login');
    }
}
