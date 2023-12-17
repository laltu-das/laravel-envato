<?php

namespace Laltu\LaravelEnvato\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Laltu\LaravelEnvatoInstaller\Skeleton\SkeletonClass
 */
class Envato extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-envato';
    }
}
