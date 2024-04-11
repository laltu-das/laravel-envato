<?php

namespace Laltu\LaravelEnvato\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Laltu\LaravelEnvatoInstaller\Skeleton\SkeletonClass
 */
class LaravelEnvato extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return \Laltu\LaravelEnvato\EnvatoManager::class;
    }
}
