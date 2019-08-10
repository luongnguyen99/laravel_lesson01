<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserFpt
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
        $user = $request->user();
        if($user->university != 'FPT'){
            return abort(403, 'Khoong cos quyen dang nhap vi may khong thuoc FPT');
        }
        return $next($request);
    }
}
