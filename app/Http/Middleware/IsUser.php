<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUser
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
        // Si il y a un utilisateur connecté
        if (auth()->user()){
                //Continuer requête
                return $next($request);
        }else{
            //Sinon renvoyer page 403
            abort(403);
        }
    }
}
