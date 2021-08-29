<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->guard('admin_users')->check())
        {
            view()->share('user_login',auth()->guard('admin_users')->user());
            return $next($request);
        }
        //auth()->guard('admin_users')->logout();
        return redirect('admin/login');
    }
}
