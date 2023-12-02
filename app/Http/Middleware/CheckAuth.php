<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (auth::check()) {
            // Nếu người dùng đã đăng nhập, cho phép tiếp tục xử lý request
            return $next($request);
        }

        // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        return redirect()->route('client.login')->with('error', 'Vui lòng đăng nhập trước khi thêm sản phẩm vào giỏ hàng.');
    }
}
