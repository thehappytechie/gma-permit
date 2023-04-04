<button class="reset app-ui__header-btn js-tab-focus" aria-controls="notifications-popover">
    <svg class="icon" viewBox="0 0 20 20">
        <title>Notifications</title>
        <path d="M16,12V7a6,6,0,0,0-6-6h0A6,6,0,0,0,4,7v5L2,16H18Z" fill="none" stroke="currentColor"
            stroke-miterlimit="10" stroke-width="2" />
        <path d="M7.184,18a2.982,2.982,0,0,0,5.632,0Z" />
    </svg>
    <span class="app-ui__notification-indicator"><i class="sr-only"></i></span>
</button>
<div id="notifications-popover" class="popover notif-popover bg radius-md shadow-md js-popover" role="dialog">
    <header class="bg-light bg-opacity-90% backdrop-blur-10 padding-sm shadow-xs position-sticky top-0 z-index-2">
        <div class="flex justify-between items-baseline">
            <h1 class="text-base font-medium">Notifications</h1>
            <a class="text-sm" href="{{ route('notification') }}">View all</a>
        </div>
    </header>
    <ul class="notif text-sm">
        <li class="notif__item ">
            <a class="notif__link flex padding-sm" href="{{ route('notification') }}">
                <div class="flex-grow margin-right-xs">
                    <div>
                        <p>You have <em class="color-primary">{{ $expiringContracts }} new notifications</em></p>
                    </div>
                </div>
                <div class="notif__dot margin-left-auto" aria-hidden="true"></div>
            </a>
        </li>
    </ul>
</div>
