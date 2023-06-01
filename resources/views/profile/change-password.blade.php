@section('title', 'Change password')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Account Management</h2>
    </div>

    <div class="margin-bottom-md">
        <nav class="s-tabs">
            <ul class="s-tabs__list">
                <li><a class="s-tabs__link" href="{{ route('profile.edit', Auth::user()->id) }}">Profile</a></li>
                <li><a class="s-tabs__link s-tabs__link--current" href="{{ route('changePassword') }}">Password</a>
                </li>
                <li><a class="s-tabs__link" href="{{ route('security') }}">Account Security</a></li>
            </ul>
        </nav>
    </div>

    <div class="bg radius-md shadow-xs">
        <div class="max-width-sm">
            <form action="{{ route('user-password.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="padding-lg">
                    <fieldset class="margin-bottom-xl">
                        <legend class="margin-bottom-md font-medium text-md">Current Password</legend>
                        <div class="margin-bottom-sm">
                            <div class="grid gap-xxs">
                                <div class="col-6@lg">
                                    <label class="inline-block text-sm padding-top-xs@lg" for="old-password">
                                        <x-required-label></x-required-label>Old Password
                                    </label>
                                </div>
                                <div class="col-6@lg">
                                    <div class="password js-password">
                                        <input
                                            class="password__input form-control width-100% js-password__input @error('current_password') is-error @enderror"
                                            type="password" name="current_password" id="old-password" required>
                                        @error('current_password')
                                            <x-validation-error>{{ $message }}</x-validation-error>
                                        @enderror
                                        <button class="password__btn flex flex-center js-password__btn js-tab-focus"
                                            style="outline: none;">
                                            <span class="password__btn-label" aria-label="Show password"
                                                title="Show password">
                                                <svg class="icon block" viewBox="0 0 20 20">
                                                    <path d="M1,10s4-6,9-6,9,6,9,6-4,6-9,6S1,10,1,10Z" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"></path>
                                                    <circle fill="currentColor" cx="10" cy="10"
                                                        r="3"></circle>
                                                </svg>
                                            </span>

                                            <span class="password__btn-label" aria-label="Hide password"
                                                title="Hide password">
                                                <svg class="icon block position-fixed" viewBox="0 0 20 20">
                                                    <circle fill="currentColor" cx="10" cy="10"
                                                        r="3"></circle>
                                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2">
                                                        <line x1="2" y1="18" x2="18"
                                                            y2="2">
                                                        </line>
                                                        <path
                                                            d="M5.511,14.489A18.132,18.132,0,0,1,1,10s4-6,9-6a8.276,8.276,0,0,1,4.489,1.511">
                                                        </path>
                                                        <path
                                                            d="M17,7.606A18.257,18.257,0,0,1,19,10s-4,6-9,6a6.383,6.383,0,0,1-1-.079">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <!-- new password -->
                    <fieldset class="margin-bottom-md">
                        <legend class="margin-bottom-md font-medium text-md">New Password</legend>
                        <div class="margin-bottom-sm">
                            <div class="grid gap-xxs">
                                <div class="col-6@lg">
                                    <label class="inline-block text-sm padding-top-xs@lg" for="new-password">
                                        <x-required-label></x-required-label>New
                                        Password
                                    </label>
                                </div>
                                <div class="col-6@lg">
                                    <div class="password js-password ">
                                        <input
                                            class="password__input form-control width-100% js-password__input @error('password') is-error @enderror"
                                            type="password" name="password" id="new-password" required>
                                        @error('password')
                                            <x-validation-error>{{ $message }}</x-validation-error>
                                        @enderror
                                        <button class="password__btn flex flex-center js-password__btn js-tab-focus"
                                            style="outline: none;">
                                            <span class="password__btn-label" aria-label="Show password"
                                                title="Show password">
                                                <svg class="icon  position-relative" viewBox="0 0 20 20">
                                                    <path d="M1,10s4-6,9-6,9,6,9,6-4,6-9,6S1,10,1,10Z" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"></path>
                                                    <circle fill="currentColor" cx="10" cy="10"
                                                        r="3"></circle>
                                                </svg>
                                            </span>
                                            <span class="password__btn-label" aria-label="Hide password"
                                                title="Hide password">
                                                <svg class="icon block" viewBox="0 0 20 20">
                                                    <circle fill="currentColor" cx="10" cy="10"
                                                        r="3"></circle>
                                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2">
                                                        <line x1="2" y1="18" x2="18"
                                                            y2="2"></line>
                                                        <path
                                                            d="M5.511,14.489A18.132,18.132,0,0,1,1,10s4-6,9-6a8.276,8.276,0,0,1,4.489,1.511">
                                                        </path>
                                                        <path
                                                            d="M17,7.606A18.257,18.257,0,0,1,19,10s-4,6-9,6a6.383,6.383,0,0,1-1-.079">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="grid gap-xxs">
                                <div class="col-6@lg">
                                    <label class="inline-block text-sm padding-top-xs@lg" for="new-password-2">
                                        <x-required-label></x-required-label>Confirm New
                                        Password
                                    </label>
                                </div>

                                <div class="col-6@lg">
                                    <div class="password js-password ">
                                        <input
                                            class="password__input form-control width-100% js-password__input @error('password_confirmation') is-error @enderror"
                                            type="password" name="password_confirmation" id="new-password-2"
                                            required>
                                        @error('password_confirmation')
                                            <x-validation-error>{{ $message }}</x-validation-error>
                                        @enderror
                                        <button class="password__btn flex flex-center js-password__btn js-tab-focus"
                                            style="outline: none;">
                                            <span class="password__btn-label" aria-label="Show password"
                                                title="Show password">
                                                <svg class="icon block" viewBox="0 0 20 20">
                                                    <path d="M1,10s4-6,9-6,9,6,9,6-4,6-9,6S1,10,1,10Z" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"></path>
                                                    <circle fill="currentColor" cx="10" cy="10"
                                                        r="3"></circle>
                                                </svg>
                                            </span>
                                            <span class="password__btn-label" aria-label="Hide password"
                                                title="Hide password">
                                                <svg class="icon block" viewBox="0 0 20 20">
                                                    <circle fill="currentColor" cx="10" cy="10"
                                                        r="3"></circle>
                                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2">
                                                        <line x1="2" y1="18" x2="18"
                                                            y2="2"></line>
                                                        <path
                                                            d="M5.511,14.489A18.132,18.132,0,0,1,1,10s4-6,9-6a8.276,8.276,0,0,1,4.489,1.511">
                                                        </path>
                                                        <path
                                                            d="M17,7.606A18.257,18.257,0,0,1,19,10s-4,6-9,6a6.383,6.383,0,0,1-1-.079">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="border-top border-contrast-lower text-right">
                        <div class="margin-top-sm">
                            <button class="btn btn--primary btn--md font-medium">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>
