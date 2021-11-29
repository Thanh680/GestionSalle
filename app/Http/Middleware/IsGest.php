<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsGest
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
        // S'il y a un utilisateur connecté
        if (auth()->user()){
            // Si l'utilisateur connecté est Gestionnaire du batiment (idType_users = 2)
            if (auth()->user()->idType_users == 2) {
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
