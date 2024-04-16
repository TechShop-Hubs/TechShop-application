<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = session('role');
        if($role==1){
            return $next($request);
        }
        if($role!==1){
            return redirect()->route('home')->with('err', 'Bạn đang xem trang web với vai trò là một người dùng, không được phép đến trang này');
        }
        return redirect()->route('login');
    }
}
