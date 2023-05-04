<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Util\Roles;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasAssignedTask
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User $user */
        $user = auth()->user();

        if(!$user->hasRole(Roles::ROLE_STUDENT))
        {
            return $next($request);
        }

        if(!$user->hasTask())
        {
            return $next($request);
        }

        abort(403);
    }
}
