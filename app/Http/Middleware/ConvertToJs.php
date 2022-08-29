<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ConvertToJs
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
        $request->headers->set('Content-Type', 'application/javascript; charset=UTF-8');
        return $next($request);
    }
}
