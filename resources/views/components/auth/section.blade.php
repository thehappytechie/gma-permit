<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/font/montserrat.css') }}" rel="stylesheet">
    <link id="codyframe" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pace-theme-default.min.css') }}">
    <title>@yield('title')</title>
</head>

<body class="bg-contrast-lower">
    @if (request()->routeIs('login'))
        <div class="bg-white padding-y-md shadow-xs">
            <div class="container flex justify-center">
                <x-brand></x-brand>
            </div>
        </div>
    @endif

    <div class="flex flex-center padding-y-xl">
        <div class="container max-width-xxxs">
            <div class="margin-auto text-center">
                <x-auth.logo></x-auth.logo>
            </div>
            {{ $slot }}
        </div>
    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/components-script.js') }}"></script>

</body>

</html>
