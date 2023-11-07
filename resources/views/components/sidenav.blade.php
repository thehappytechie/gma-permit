<nav class="sidenav padding-y-sm js-sidenav">
    <ul class="sidenav__list">
        <li class="sidenav__item">
            <a href="{{ route('dashboard') }}" class="sidenav__link">
                <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z" />
                </svg>
                <span class="sidenav__text text-sm">Dashboard</span>
            </a>
        </li>
    </ul>
    <ul class="sidenav__list margin-y-sm">
        <li class="sidenav__item">
            <a href="{{ route('companyDatatable') }}" class="sidenav__link">
                <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16">
                    <path
                        d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022ZM6 8.694 1 10.36V15h5V8.694ZM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15Z" />
                    <path
                        d="M2 11h1v1H2v-1Zm2 0h1v1H4v-1Zm-2 2h1v1H2v-1Zm2 0h1v1H4v-1Zm4-4h1v1H8V9Zm2 0h1v1h-1V9Zm-2 2h1v1H8v-1Zm2 0h1v1h-1v-1Zm2-2h1v1h-1V9Zm0 2h1v1h-1v-1ZM8 7h1v1H8V7Zm2 0h1v1h-1V7Zm2 0h1v1h-1V7ZM8 5h1v1H8V5Zm2 0h1v1h-1V5Zm2 0h1v1h-1V5Zm0-2h1v1h-1V3Z" />
                </svg>
                <span class="sidenav__text text-sm">Companies</span>
            </a>
        </li>
    </ul>
    <ul class="sidenav__list margin-y-sm">
        <li class="sidenav__item">
            <a class="reset js-sidenav__sublist-control js-tab-focus sidenav__link">
                <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16">
                    <path
                        d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" />
                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                </svg>
                <span class="sidenav__text text-sm">Certificates </span>
            </a>
            <button class="reset sidenav__sublist-control js-sidenav__sublist-control js-tab-focus"
                aria-label="Toggle sub navigation">
                <svg class="icon" viewBox="0 0 12 12">
                    <polygon points="4 3 8 6 4 9 4 3" />
                </svg>
            </button>
            <ul class="sidenav__list">
                <li class="sidenav__item">
                    <a href="{{ route('certificateDatatable') }}" class="sidenav__link">
                        <span class="sidenav__text text-sm">All certificates</span>
                    </a>
                </li>
                <li class="sidenav__item">
                    <a href="{{ route('editCertificateDatatable') }}" class="sidenav__link">
                        <span class="sidenav__text text-sm">Manage certificates</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="sidenav__list margin-y-sm">
        <li class="sidenav__item">
            <a href="{{ route('vesselDatatable') }}" class="sidenav__link">
                <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16">
                    <path
                        d="M5 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm8 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-6-1a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7ZM4 2a1 1 0 0 0-1 1v3.9c0 .625.562 1.092 1.17.994C5.075 7.747 6.792 7.5 8 7.5c1.208 0 2.925.247 3.83.394A1.008 1.008 0 0 0 13 6.9V3a1 1 0 0 0-1-1H4Zm0 1h8v3.9c0 .002 0 .001 0 0l-.002.004a.013.013 0 0 1-.005.002h-.004C11.088 6.761 9.299 6.5 8 6.5s-3.088.26-3.99.406h-.003a.013.013 0 0 1-.005-.002L4 6.9c0 .001 0 .002 0 0V3Z" />
                    <path
                        d="M1 2.5A2.5 2.5 0 0 1 3.5 0h9A2.5 2.5 0 0 1 15 2.5v9c0 .818-.393 1.544-1 2v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5V14H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2a2.496 2.496 0 0 1-1-2v-9ZM3.5 1A1.5 1.5 0 0 0 2 2.5v9A1.5 1.5 0 0 0 3.5 13h9a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 12.5 1h-9Z" />
                </svg>
                <span class="sidenav__text text-sm">Vessels</span>
            </a>
        </li>
    </ul>
    <ul class="sidenav__list margin-y-sm">
        <li class="sidenav__item">
            <a class="reset js-sidenav__sublist-control js-tab-focus sidenav__link">
                <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16">
                    <path
                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                    <path
                        d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                </svg>
                <span class="sidenav__text text-sm">Permits </span>
            </a>
            <button class="reset sidenav__sublist-control js-sidenav__sublist-control js-tab-focus"
                aria-label="Toggle sub navigation">
                <svg class="icon" viewBox="0 0 12 12">
                    <polygon points="4 3 8 6 4 9 4 3" />
                </svg>
            </button>
            <ul class="sidenav__list">
                <li class="sidenav__item">
                    <a href="{{ route('permitDatatable') }}" class="sidenav__link">
                        <span class="sidenav__text text-sm">All permits</span>
                    </a>
                </li>
            </ul>
            <ul class="sidenav__list">
                <li class="sidenav__item">
                    <a href="{{ route('operatingPermitDatatable') }}" class="sidenav__link">
                        <span class="sidenav__text text-sm">Operating permits</span>
                    </a>
                </li>
            </ul>
            <ul class="sidenav__list">
                <li class="sidenav__item">
                    <a href="{{ route('safetyPermitDatatable') }}" class="sidenav__link">
                        <span class="sidenav__text text-sm">Safety permits</span>
                    </a>
                </li>
            </ul>
            <ul class="sidenav__list">
                <li class="sidenav__item">
                    <a href="{{ route('permitUnitDatatable') }}" class="sidenav__link">
                        <span class="sidenav__text text-sm">Permit units</span>
                    </a>
                </li>
            </ul>
            <ul class="sidenav__list">
                <li class="sidenav__item">
                    <a href="{{ route('editPermitDatatable') }}" class="sidenav__link">
                        <span class="sidenav__text text-sm">Manage permits</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>

    @hasrole('superuser')
        <ul class="sidenav__list margin-y-sm">
            <li class="sidenav__item">
                <a class="reset js-sidenav__sublist-control js-tab-focus sidenav__link">
                    <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                    </svg>
                    <span class="sidenav__text text-sm">User Management </span>
                </a>
                <button class="reset sidenav__sublist-control js-sidenav__sublist-control js-tab-focus"
                    aria-label="Toggle sub navigation">
                    <svg class="icon" viewBox="0 0 12 12">
                        <polygon points="4 3 8 6 4 9 4 3" />
                    </svg>
                </button>
                <ul class="sidenav__list">
                    <li class="sidenav__item">
                        <a href="{{ route('departmentDatatable') }}" class="sidenav__link">
                            <span class="sidenav__text text-sm">Departments</span>
                        </a>
                    </li>
                    <li class="sidenav__item">
                        <a href="{{ route('locationDatatable') }}" class="sidenav__link">
                            <span class="sidenav__text text-sm">Locations</span>
                        </a>
                    </li>
                    <li class="sidenav__item">
                        <a href="{{ route('userDatatable') }}" class="sidenav__link">
                            <span class="sidenav__text text-sm">Users</span>
                        </a>
                    </li>
                    <li class="sidenav__item">
                        <a href="{{ route('roleDatatable') }}" class="sidenav__link">
                            <span class="sidenav__text text-sm">Roles</span>
                        </a>
                    </li>
                    <li class="sidenav__item">
                        <a href="{{ route('permissionDatatable') }}" class="sidenav__link">
                            <span class="sidenav__text text-sm">Permissions</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="sidenav__list">
            <li class="sidenav__item">
                <a href="{{ route('settings') }}" class="sidenav__link">
                    <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16">
                        <path
                            d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                        <path
                            d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                    </svg>
                    <span class="sidenav__text text-sm">Settings</span>
                </a>
            </li>
        </ul>
    @endhasrole
</nav>
