<?php

namespace App\Http\Middleware;

use App\Util\Roles;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustHaveRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(auth()->check() && (auth()->user()->hasRole($role) || auth()->user()->hasRole(Roles::ROLE_ADMIN)) ){

            return $next($request);

        } else {
            abort(403);
        }
    }
}
