<?php

namespace Laltu\LaravelEnvato\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Laltu\LaravelEnvato\View\Components\AppLayout;
use Livewire\Component;

class PreInstallation extends Component
{
    public $extensions = [];

    public $directories = [];

    public function satisfied(): bool
    {
        return collect($this->extensions)
            ->merge($this->directories)
            ->every(function ($item) {
                return $item;
            });
    }

    public function mount() {
        $this->extensions = [
            'PHP >= 8.0.2' => version_compare(phpversion(), '8.0.2'),
            'Intl PHP Extension' => extension_loaded('intl'),
            'OpenSSL PHP Extension' => extension_loaded('openssl'),
            'PDO PHP Extension' => extension_loaded('pdo'),
            'Mbstring PHP Extension' => extension_loaded('mbstring'),
            'Tokenizer PHP Extension' => extension_loaded('tokenizer'),
            'XML PHP Extension' => extension_loaded('xml'),
            'Ctype PHP Extension' => extension_loaded('ctype'),
            'JSON PHP Extension' => extension_loaded('json'),
            'Curl PHP Extension' => extension_loaded('curl'),
        ];

        $this->directories = [
            '.env' => is_writable(base_path('.env')),
            'storage' => is_writable(storage_path()),
            'bootstrap/cache' => is_writable(app()->bootstrapPath('cache')),
        ];
    }

    /**
     * Render the component.
     */
    public function render(): Renderable
    {
        return view('laravel-envato::livewire.pre-installation',[
//            'requirement' => $this->requirement,
        ])->layout(AppLayout::class);
    }
}
