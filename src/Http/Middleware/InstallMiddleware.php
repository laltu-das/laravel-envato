<?php

namespace Laltu\LaravelEnvato\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InstallMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $routeName = config('laravel-envato.redirect.route.name');
        $data = config('laravel-envato.redirect.route.message');

        return redirect()->route($routeName)->with(['data' => $data]);

//        return $next($request);
    }
}
