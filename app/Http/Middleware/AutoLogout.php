<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AutoLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check() && !$request->is('admin') && !$request->is('admin/*')) { // Chỉ giữ đăng nhập ở trang admin
            Auth::guard('admin')->logout();
            return redirect('/admin/login')->with('message', 'Bạn đã bị đăng xuất!');
        }
        return $next($request);
    }
}
