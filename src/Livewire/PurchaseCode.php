<?php

namespace Laltu\LaravelEnvato\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Laltu\LaravelEnvato\View\Components\AppLayout;
use Livewire\Component;


class PurchaseCode extends Component
{

    public $purchase_code;

    public function submit(): void
    {

    }

    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        return view('laravel-envato::livewire.purchase-code')->layout(AppLayout::class);
    }
}
