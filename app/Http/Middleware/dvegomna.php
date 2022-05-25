<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class dvegomna
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'gomno') {
            return redirect()->route('gomno');
        }

        if (Auth::user()->role == 'dvegomna') {
            return $next($request);
        }

        if (Auth::user()->role == 'Admin') {
            return redirect()->route('Admin');
        }

        
    }
}
