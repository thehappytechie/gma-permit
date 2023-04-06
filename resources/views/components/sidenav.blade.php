<nav class="sidenav padding-y-sm js-sidenav">
    <ul class="sidenav__list">
        <li class="sidenav__item">
            <a href="{{ route('dashboard') }}" class="sidenav__link">
                <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z" />
                </svg>
                <span class="sidenav__text text-sm@md">Dashboard</span>
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
                <span class="sidenav__text text-sm@md">Companies</span>
            </a>
        </li>
    </ul>
    <ul class="sidenav__list margin-y-sm">
        <li class="sidenav__item">
            <a href="{{ route('vesselDatatable') }}" class="sidenav__link">
                <svg class="icon sidenav__icon" aria-hidden="true" viewBox="0 0 16 16">
                    <path d="M5 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm8 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-6-1a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2H7ZM4 2a1 1 0 0 0-1 1v3.9c0 .625.562 1.092 1.17.994C5.075 7.747 6.792 7.5 8 7.5c1.208 0 2.925.247 3.83.394A1.008 1.008 0 0 0 13 6.9V3a1 1 0 0 0-1-1H4Zm0 1h8v3.9c0 .002 0 .001 0 0l-.002.004a.013.013 0 0 1-.005.002h-.004C11.088 6.761 9.299 6.5 8 6.5s-3.088.26-3.99.406h-.003a.013.013 0 0 1-.005-.002L4 6.9c0 .001 0 .002 0 0V3Z"/>
                    <path d="M1 2.5A2.5 2.5 0 0 1 3.5 0h9A2.5 2.5 0 0 1 15 2.5v9c0 .818-.393 1.544-1 2v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5V14H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2a2.496 2.496 0 0 1-1-2v-9ZM3.5 1A1.5 1.5 0 0 0 2 2.5v9A1.5 1.5 0 0 0 3.5 13h9a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 12.5 1h-9Z"/>
                </svg>
                <span class="sidenav__text text-sm@md">Vessels</span>
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
                <span class="sidenav__text text-sm@md">Contracts </span>
            </a>
            <button class="reset sidenav__sublist-control js-sidenav__sublist-control js-tab-focus"
                aria-label="Toggle sub navigation">
                <svg class="icon" viewBox="0 0 12 12">
                    <polygon points="4 3 8 6 4 9 4 3" />
                </svg>
            </button>
            <ul class="sidenav__list">
                <li class="sidenav__item">
                    <a href="{{ route('contractDatatable') }}" class="sidenav__link">
                        <span class="sidenav__text text-sm@md">All contracts</span>
                    </a>
                </li>
            </ul>
            <ul class="sidenav__list">
                <li class="sidenav__item">
                    <a href="{{ route('contractReportDatatable') }}" class="sidenav__link">
                        <span class="sidenav__text text-sm@md">Reports</span>
                    </a>
                </li>
            </ul>
            <ul class="sidenav__list">
                <li class="sidenav__item">
                    <a href="{{ route('categoryDatatable') }}" class="sidenav__link">
                        <span class="sidenav__text text-sm@md">Categories</span>
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
                    <span class="sidenav__text text-sm@md">User Management </span>
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
                            <span class="sidenav__text text-sm@md">Departments</span>
                        </a>
                    </li>
                    <li class="sidenav__item">
                        <a href="{{ route('locationDatatable') }}" class="sidenav__link">
                            <span class="sidenav__text text-sm@md">Locations</span>
                        </a>
                    </li>
                    <li class="sidenav__item">
                        <a href="{{ route('userDatatable') }}" class="sidenav__link">
                            <span class="sidenav__text text-sm@md">Users</span>
                        </a>
                    </li>
                    <li class="sidenav__item">
                        <a href="{{ route('roleDatatable') }}" class="sidenav__link">
                            <span class="sidenav__text text-sm@md">Roles</span>
                        </a>
                    </li>
                    <li class="sidenav__item">
                        <a href="{{ route('permissionDatatable') }}" class="sidenav__link">
                            <span class="sidenav__text text-sm@md">Permissions</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    @endhasrole

</nav>
