<?php


use Illuminate\Support\Facades\Route;
use Laltu\LaravelEnvato\Livewire\AdminSetup;
use Laltu\LaravelEnvato\Livewire\Complete;
use Laltu\LaravelEnvato\Livewire\DatabaseSetup;
use Laltu\LaravelEnvato\Livewire\Installation;
use Laltu\LaravelEnvato\Livewire\MailSetup;
use Laltu\LaravelEnvato\Livewire\PreInstallation;
use Laltu\LaravelEnvato\Livewire\PurchaseCode;

Route::get('/', Installation::class)->name('init');
Route::get('/pre-installation', PreInstallation::class)->name('pre-installation');
Route::get('/admin-setup', AdminSetup::class)->name('admin-setup');
Route::get('/mail-setup', MailSetup::class)->name('mail-setup');
Route::get('/database-setup', DatabaseSetup::class)->name('database-setup');
Route::get('/complete', Complete::class)->name('complete');
Route::get('/purchase-code', PurchaseCode::class)->name('purchase-code');