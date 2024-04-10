<?php

use Illuminate\Support\Facades\Route;
use Laltu\LaravelEnvato\Http\Controllers\EnvatoVerificationController;
use Laltu\LaravelEnvato\Http\Controllers\InstallationController;

Route::prefix('install')->name('install.')->group(function () {
    Route::get('/', [InstallationController::class, 'showGettingStarted'])->name('getting-started');
    Route::get('server-requirements', [InstallationController::class, 'showServerRequirements'])->name('server-requirements');
    Route::get('folder-permissions', [InstallationController::class, 'showFolderPermissions'])->name('folder-permissions');

    Route::get('environment-variables', [InstallationController::class, 'showEnvironmentVariables'])->name('environment-variables');
    Route::post('environment-variables', [InstallationController::class, 'submitEnvironmentVariables'])->name('environment-variables.submit');

    Route::get('envato-license', [InstallationController::class, 'showEnvatoLicense'])->name('envato-license');
    Route::post('envato-license', [InstallationController::class, 'submitEnvatoLicense'])->name('envato-license.submit');

    Route::get('installation-progress', [InstallationController::class, 'showInstallationProgress'])->name('installation-progress');
});

Route::get('envato-verify', [EnvatoVerificationController::class, 'index'])->name('envato.verify');
Route::post('envato-verify', [EnvatoVerificationController::class, 'verify'])->name('envato.verify.submit');
