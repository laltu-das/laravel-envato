<?php

namespace Laltu\LaravelEnvato\Http\Controllers;

use Laltu\LaravelEnvato\Facades\LaravelEnvato;

class IndexController
{
    public function __invoke()
    {
        return view('laravel-envato::layout', [
            'laravelEnvatoScriptVariables' => [
                'headers' => (object) [],
//                'assets_outdated' => ! LogViewer::assetsAreCurrent(),
//                'version' => LogViewer::version(),
                'app_name' => config('app.name'),
                'path' => 'install',
                'back_to_system_url' => config('laravel-envato.back_to_system_url'),
                'back_to_system_label' => config('laravel-envato.back_to_system_label'),
//                'max_log_size_formatted' => Utils::bytesForHumans(LogViewer::maxLogSize()),
                'show_support_link' => config('laravel-envato.show_support_link', true),

//                'supports_hosts' => LogViewer::supportsHostsFeature(),
//                'hosts' => LogViewer::getHosts(),
            ],
        ]);
    }
}
