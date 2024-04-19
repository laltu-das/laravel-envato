<?php

use Illuminate\Support\Facades\Route;
use Laltu\LaravelEnvato\Http\Controllers\IndexController;
use Laltu\LaravelEnvato\Http\Controllers\InstallationController;

Route::middleware('api')->prefix('api/install/')->group(function () {

    Route::get('/server-requirements', [InstallationController::class, 'showServerRequirements']);
    Route::get('/folder-permissions', [InstallationController::class, 'showFolderPermissions']);
    Route::get('/environment-variables', [InstallationController::class, 'showEnvironmentVariables']);

    Route::post('/envato-license', [InstallationController::class, 'submitEnvatoLicense']);
    Route::get('/installation-progress', [InstallationController::class, 'showInstallationProgress']);
});

Route::get('/{view?}', IndexController::class)
    ->where('view', '(.*)')
    ->name('laravel-envato.layout');