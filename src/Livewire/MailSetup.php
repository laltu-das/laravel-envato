<?php

namespace Laltu\LaravelEnvato\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class MailSetup extends Component
{
    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        return view('laravel-envato::livewire.mail-setup')->extends('laravel-envato::components.layouts.app');
    }
}
