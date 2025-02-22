<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role !== 'admin') {
            return $next($request);
        }

        return redirect('/')->with(['error'=>'please enter correct credentials']); // Redirect if the user is an admin
    }
}
