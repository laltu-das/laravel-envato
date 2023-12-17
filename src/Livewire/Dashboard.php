<?php

namespace Laltu\LaravelEnvato\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class Dashboard extends Component
{
    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        return view('laravel-envato::livewire.dashboard')->extends('laravel-maker::components.layouts.app');
    }
}
