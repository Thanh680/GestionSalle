<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsTech
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
            // Si l'utilisateur connecté est technicien (idType_users = 1)
            if (auth()->user()->idType_users == 1) {
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
