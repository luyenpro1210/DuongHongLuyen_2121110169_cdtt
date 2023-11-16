<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            // Chuyen huong ve trang dang nhap
            return redirect()->route('admin.getlogin');
        }
        else{
            $user = Auth::user();
            if($user->status==0 || $user->roles!=1)
            {
                return redirect()->route('site.index');
            }   
        }
        return $next($request);
    }
}
