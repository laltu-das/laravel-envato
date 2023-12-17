<?php

namespace Laltu\LaravelEnvato\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Laltu\LaravelEnvato\Requirement;
use Livewire\Component;

class PreInstallation extends Component
{
public $requirement;

    public function mount(Requirement $requirement) {
        $this->requirement = $requirement;
    }

    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        return view('laravel-envato::livewire.pre-installation',[
            'requirement' => $this->requirement,
        ])->extends('laravel-envato::components.layouts.app');
    }
}
