<?php


use Illuminate\Support\Facades\Route;
use Laltu\LaravelEnvato\Livewire\Dashboard;

Route::get('/', Dashboard::class)->name('dashboard');