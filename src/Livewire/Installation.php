<?php

namespace Laltu\LaravelEnvato\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Laltu\LaravelEnvato\View\Components\AppLayout;
use Livewire\Component;

class Installation extends Component
{
    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        return view('laravel-envato::livewire.installation')->layout(AppLayout::class);
    }
}
