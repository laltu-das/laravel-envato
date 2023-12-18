<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>Laravel Envato</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600" rel="stylesheet"/>

    {!! \Laltu\LaravelEnvato\Facades\LaravelEnvato::css() !!}

    @livewireStyles

    {!! \Laltu\LaravelEnvato\Facades\LaravelEnvato::js() !!}
</head>
<body class="font-sans antialiased">
{{ $slot }}
@livewireScripts
@stack('scripts')
</body>
</html>