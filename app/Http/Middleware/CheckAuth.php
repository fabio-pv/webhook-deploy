<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LaravelSimpleBases\Exceptions\AuthenticationException;

class CheckAuth
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next)
    {
        if (empty(Auth::user())) {
            throw new AuthenticationException('Authentication required');
        }

        return $next($request);
    }
}
