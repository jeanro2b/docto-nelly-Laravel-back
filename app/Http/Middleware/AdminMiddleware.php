<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::check()) {
            if (Auth::user()->role === 'admin') {
                return $next($request);
            } else {
                return redirect('/')->with('message', "Accès refusé car utilisateur non admin");
            }
        } else {
            return redirect('/login')->with('message', "Connectez-vous en tant que Admin pour accéder aux infos");
        }
        return $next($request);
    }
}
