<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class clientes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('token')) {
            if (!session()->has('id')) {
                return redirect()->route('index');
            }
        }

        return $next($request);
    }
}
