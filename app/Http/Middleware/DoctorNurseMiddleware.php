<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorNurseMiddleware
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
        // return $next($request);
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role =='doctor') {
            return $next($request);
        }
        if (Auth::user()->role == 'nurse') {
            return $next($request);
        }
        if (Auth::user()->role == 'pharmacy') {
            return redirect()->route('pharmacy');
        }
        if (Auth::user()->role == 'laboratory') {
            return redirect()->route('laboratory');
        }
    }
}
