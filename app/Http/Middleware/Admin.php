<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
       
      
        if (Auth::user()->is_admin==1) {

                return $next($request);
        }
        else
        {
            return redirect(route('admin-login'))->errors('You are not valid user');
        }
    }
}
