<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRole
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
        $roles = $this->cekRoute($request->route());

        if($request->user()->hasRole($roles) || !$roles){   // Pengecekan role_id pada function hasRole di Model User
            return $next($request);
        }
        return abort(403, 'Access Forbidden');  // jika tidak sesuai dengan role_id user, akan forbidden
    }

    public function cekRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['cekrole']) ? $actions['cekrole'] : null; //check role, pada route apakah ada "cekrole" atau tidak
    }
}