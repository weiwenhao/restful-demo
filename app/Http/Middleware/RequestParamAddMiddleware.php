<?php

namespace App\Http\Middleware;

use Closure;

class RequestParamAddMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->request->add($request->route()->parameters());

        return $next($request);
    }
}
