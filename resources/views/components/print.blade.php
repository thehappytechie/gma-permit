<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="assets/img/favicon.svg">
    <link id="codyframe" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <title>@yield('title')</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    span {
        font-family: monospace;
        font-weight: bold;
    }

    @media print {
        .cta__button-section {
            display: none !important;
        }
    }

    @page {
        margin: 0;
    }
</style>

<body>
    <div class="container">
        {{ $slot }}
    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
