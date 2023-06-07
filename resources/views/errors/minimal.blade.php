<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/font/montserrat.css') }}" rel="stylesheet">
    <link id="codyframe" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <title>@yield('title')</title>
</head>

<body class="bg-contrast-lower">
    <div class="text-center">
        <img src="{{ asset('img/sailor.png') }}" width="500" alt="sailor">
    </div>
    <div class="container flex flex-center ">
        <div class="bg radius-md shadow-xs max-width-xs padding-x-lg padding-y-lg text-center">
            <p class="text-md font-medium margin-bottom-md"> @yield('code') | <span class="text-base font-normal">
                    @yield('message') </span> </p>
            <a href="{{ route('login') }}" class="btn btn--primary btn--sm margin-right-xs">Return to the homepage</a>
        </div>
    </div>

    <script src="{{ asset('js/pace.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/components-script.js') }}"></script>

</body>

</html>
