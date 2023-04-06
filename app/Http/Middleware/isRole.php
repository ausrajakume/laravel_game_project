<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            //admin role = admin
            // user role = null

            if (Auth::user()->role == 'admin') {
                return $next($request);
            } else {
                return redirect()->route('user.games.index')->with('message', 'You are nor admin');
            }
        } else {
            return redirect()->route('login')->with('message', 'You are nor admin');
        }

        // return $next($request);
    }
}
