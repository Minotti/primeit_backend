<?php

namespace App\Modules\Core\Http\Middlewares;

use App\Modules\Core\Traits\HttpResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasRole
{
    use HttpResponseTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (empty($roles)) {
            return $next($request);
        }

        if (in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }

        return $this->unauthorizedResponse();
    }
}
