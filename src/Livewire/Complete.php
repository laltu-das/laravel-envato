<?php

namespace Laltu\LaravelEnvato\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Laltu\LaravelEnvato\View\Components\AppLayout;
use Livewire\Component;

class Complete extends Component
{
    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        return view('laravel-envato::livewire.complete')->layout(AppLayout::class);
    }
}
