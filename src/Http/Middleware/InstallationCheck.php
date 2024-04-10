<?php

namespace Laltu\LaravelEnvato\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laltu\LaravelEnvato\Facades\LaravelEnvato;
use Symfony\Component\HttpFoundation\Response;

class InstallationCheck
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $check = LaravelEnvato::checkInstall();

        if (!$check) {
            return redirect()->route('install.getting-started');
        }

        return $next($request);
    }
}
