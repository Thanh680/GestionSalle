<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
            // Si l'utilisateur connecté est administrateur (idType_users = 0)
            if (auth()->user()->idType_users == 0) {
                //Continuer requête
                return $next($request);
            }else{
                //Sinon renvoyer page 403
                abort(403);
            }
        }else{
            //Sinon renvoyer page 403
            abort(403);
        }

    }
}
