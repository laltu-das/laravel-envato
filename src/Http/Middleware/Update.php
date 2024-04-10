<?php

namespace Laltu\LaravelEnvato\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Update
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $updateEnabled = filter_var(config('installer.updaterEnabled'), FILTER_VALIDATE_BOOLEAN);
        switch ($updateEnabled) {
            case true:
                $canInstall = new InstallMiddleware;

                // if the application has not been installed,
                // redirect to the installer
                if (! $canInstall->alreadyInstalled()) {
                    return redirect()->route('LaravelInstaller::welcome');
                }

                if ($this->alreadyUpdated()) {
                    abort(404);
                }
                break;

            case false:
            default:
                abort(404);
                break;
        }

        return $next($request);
    }


    /**
     * If application is already updated.
     *
     * @return bool
     */
    public function alreadyUpdated(): bool
    {
        $migrations = $this->getMigrations();
        $dbMigrations = $this->getExecutedMigrations();

        // If the count of migrations and dbMigrations is equal,
        // then the update as already been updated.
        if (count($migrations) == count($dbMigrations)) {
            return true;
        }

        // Continue, the app needs an update
        return false;
    }
}
