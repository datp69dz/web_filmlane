<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SessionInit
{
    public function handle($request, Closure $next)
    {
        if (!$request->hasSession()) {
            $session = app('session');
            $request->setLaravelSession($session);

            // Kiểm tra xem phiên bản Laravel của bạn có sử dụng CookieBasedSessionHandler không
            // Nếu không, hãy thay đổi thành Driver của bạn tại đây
            if (method_exists($session, 'getHandler') && method_exists($session->getHandler(), 'driver')) {
                $session->getHandler()->driver();
            }
        }

        return $next($request);
    }
}
