<?php

use Illuminate\Support\Facades\Route;
use Laltu\LaravelEnvato\Http\Controllers\InstallationController;

Route::group(['prefix' => 'install', 'middleware' => ['web', 'install']], function () {
    Route::get('getting-started', [InstallationController::class, 'showGettingStarted'])->name('install.getting-started');
    Route::get('server-requirements', [InstallationController::class, 'showServerRequirements'])->name('install.server-requirements');
    Route::get('folder-permissions', [InstallationController::class, 'showFolderPermissions'])->name('install.folder-permissions');

    Route::get('environment-variables', [InstallationController::class, 'showEnvironmentVariables'])->name('install.environment-variables');
    Route::post('environment-variables', [InstallationController::class, 'submitEnvironmentVariables'])->name('install.environment-variables.submit');

    Route::get('envato-license', [InstallationController::class, 'showEnvatoLicense'])->name('install.envato-license');
    Route::post('envato-license', [InstallationController::class, 'submitEnvatoLicense'])->name('install.envato-license.submit');

    Route::get('installation-progress', [InstallationController::class, 'showInstallationProgress'])->name('install.installation-progress');
});
