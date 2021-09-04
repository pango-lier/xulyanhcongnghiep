<?php

namespace App\Http\Middleware;

use Closure;
use App\AdminUser;

class OpenApiMiddleware
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
        $user=AdminUser::where('password',$request->header('open-api-key'))->first();
        if(!empty($user)){
        $request->user_api=$user;
        return $next($request);
        }
        abort(403);
    }
}
