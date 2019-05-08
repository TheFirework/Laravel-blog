<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use LaravelChen\MyFlash\MyFlash;

class AdminAuth
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
        // 如果不是管理员或者没有登录;则重定向到登录页面
        if (!Auth::guard('admin')->check()) {
            return redirect('admin/login/index');
        }

        if (Auth::guard('admin')->user()->is_admin !== 1){
            MyFlash::warning('无权限登录');
            Auth::guard('admin')->logout();
            return redirect('/');
        }

        return $next($request);
    }
}
