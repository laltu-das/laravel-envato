<?php

namespace Laltu\LaravelEnvato\Http\Controllers;

class IndexController
{
    public function __invoke()
    {
        return view('laravel-envato::layout', [
            'laravelEnvatoScriptVariables' => [
                'app_name' => config('app.name'),
                'path' => 'install',
            ],
        ]);
    }
}
