<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/font/inter.css') }}" rel="stylesheet">
    <link id="codyframe" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pace-theme-default.min.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    
    {{ $slot }}

    <script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>
