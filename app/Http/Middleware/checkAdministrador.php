<?php

namespace adminFudea\Http\Middleware;

use Closure;
use Auth;

class checkAdministrador
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
        if (Auth::user()->tipo_usuario != 0) {
            return redirect('/home');
        }
        return $next($request);
    }
}
