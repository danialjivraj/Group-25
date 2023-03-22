<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProtectPagesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->path() === 'cart' && !session()->has('cart')) {
            return redirect('/');
        }
    
        if ($request->path() === 'order-summary' && !session()->has('order')) {
            return redirect('/');
        }
    
        return $next($request);
    }
}
