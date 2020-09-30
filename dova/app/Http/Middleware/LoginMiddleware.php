<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class LoginMiddleware
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
        if(Auth::check())
        {

            $user = Auth::user();
            //kiểm tra quyền đăng nhập
            // if($user->type == 1)
            // {
            //     return $next($request);
            // }
            // else
            //     return redirect()
            //khai báo middware trong kanel

             return $next($request);
           

        }
        else
        {
            return redirect('login');
        }
     

    }
}
