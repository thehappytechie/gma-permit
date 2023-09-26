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
    <link href="{{ asset('css/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/choices.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select-dropdown.css') }}" />
    <link href="{{ asset('css/tom-select.css') }}" rel="stylesheet">

    @livewireStyles

</head>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body>
    <div class="app-ui js-app-ui">
        <header class="app-ui__header shadow-xs padding-x-md padding-x-0@md">
            <div class="app-ui__logo-wrapper padding-x-sm@md">
                <a href="{{ route('dashboard') }}" class="app-ui__logo">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" width="45">
                </a>
            </div>

            <button class="reset app-ui__menu-btn hide@md js-app-ui__menu-btn js-tab-focus" aria-label="Toggle menu"
                aria-controls="app-ui-navigation">
                <svg class="icon" viewBox="0 0 24 24">
                    <g class="icon__group" fill="none" stroke="currentColor" stroke-linecap="square"
                        stroke-miterlimit="10" stroke-width="2">
                        <path d="M1 6h22" />
                        <path d="M1 12h22" />
                        <path d="M1 18h22" />
                    </g>
                </svg>
            </button>
            <div class="display@md flex flex-grow height-100% items-center justify-between padding-x-sm">
                <form class="expandable-search text-sm@md js-expandable-search">
                    <label class="sr-only" for="expandable-search">Search</label>
                    <input class="reset expandable-search__input js-expandable-search__input" type="search"
                        name="expandable-search" id="expandable-search" placeholder="Search...">
                    <button class="reset expandable-search__btn">
                        <svg class="icon" viewBox="0 0 20 20">
                            <title>Search</title>
                            <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2">
                                <circle cx="8" cy="8" r="6" />
                                <line x1="12.243" y1="12.243" x2="18" y2="18" />
                            </g>
                        </svg>
                    </button>
                </form>
                <x-cta-button />
                <div class="flex gap-sm">

                    <button class="reset app-ui__header-btn js-tab-focus" aria-controls="notifications-popover">
                        <svg class="icon" viewBox="0 0 20 20">
                            <title>Notifications</title>
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                        </svg>
                        <span class="app-ui__notification-indicator"><i class="sr-only">You have 6
                                notifications</i></span>
                    </button>
                    <x-profile />
                </div>
            </div>
        </header>

        <!-- navigation -->
        <div class="app-ui__nav js-app-ui__nav" id="app-ui-navigation">
            <div class="flex flex-column height-100%">
                <div class="flex-grow overflow-auto momentum-scrolling">
                    <!-- (mobile-only) search -->
                    <div class="padding-x-md padding-top-md hide@md">
                        <div class="search-input search-input--icon-right">
                            <input class="form-control width-100% height-100%" type="search" name="searchInputX"
                                id="searchInputX" placeholder="Search..." aria-label="Search">
                            <button class="search-input__btn">
                                <svg class="icon" viewBox="0 0 24 24">
                                    <title>Submit</title>
                                    <g stroke-linecap="square" stroke-linejoin="miter" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-miterlimit="10">
                                        <line x1="22" y1="22" x2="15.656" y2="15.656"></line>
                                        <circle cx="10" cy="10" r="8"></circle>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <x-sidenav />
                </div>
            </div>
        </div>

        <!-- main content -->
        <main class="app-ui__body padding-md js-app-ui__body">

            <x-alert />

            {{ $slot }}

        </main>

    </div>

    <x-notification />

    @livewireScripts

    <script src="{{ asset('js/alpine.min.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/components-script.js') }}"></script>
    <script src="{{ asset('js/filepond.js') }}"></script>

</body>

</html>
