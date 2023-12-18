<?php

namespace Laltu\LaravelEnvato\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public function render(): View
    {
        return view('laravel-envato::components.app-layout');
    }
}
