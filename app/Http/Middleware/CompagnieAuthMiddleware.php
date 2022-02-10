<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CompagnieAuthMiddleware
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
        if(!session()->has("compagnie")){
            return redirect()->route("compagnie.connexion")->with("error-auth-required","Vous devez vous authentifier pour acceder à cette page");
        }
        return $next($request);
    }
}
