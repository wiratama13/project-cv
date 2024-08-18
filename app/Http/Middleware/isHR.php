<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isHR
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            !auth()->check()
            || auth()->user()->roles == 'HR'
        ) {
            return $next($request);
        } else {
            return redirect()->route('home')->with('error','Anda tidak memiliki akses');
            // return redirect()->route('login')->with('failed', 'anda tidak punya akses masuk');
        }
    }
}
