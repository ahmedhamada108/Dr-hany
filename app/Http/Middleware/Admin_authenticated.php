<?php

namespace App\Http\Middleware;

use App\Http\Traits\ResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin_authenticated
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->is('api/*')){
            if (!auth('admin')->check()) {
                return $this->returnErrorNotAuthenticate('401', 'يجب عليك تسجيل الدخول اولا');
            }
            return $next($request);
        }else{
            if (!auth('admins')->check()) {
                return redirect()->route('admin.login')->with('error','يجب عليك تسجيل الدخول اولا');
            }
            return $next($request);
        }
    }
}
