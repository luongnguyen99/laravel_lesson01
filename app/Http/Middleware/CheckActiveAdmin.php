<?php

namespace App\Http\Middleware;

use Closure;

class CheckActiveAdmin
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
        // lấy ra thông tin của thằng admin đã đăng nhập

        $user = $request->user();

        // dd($user);
        if ($user->is_active == 0) {
            return abort(403,'Khoong cos quyen');
        };
        return $next($request);
    }
}
