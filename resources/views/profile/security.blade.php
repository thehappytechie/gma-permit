@section('title', 'Security')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Account Management</h2>
    </div>
    <div class="margin-bottom-md">
        <nav class="s-tabs">
            <ul class="s-tabs__list">
                <li><a class="s-tabs__link" href="{{ route('profile.edit', Auth::user()->id) }}">Profile</a></li>
                <li><a class="s-tabs__link" href="{{ route('changePassword') }}">Password</a></li>
                <li><a class="s-tabs__link s-tabs__link--current" href="{{ route('security') }}">Account Security</a>
                <li><a class="s-tabs__link" href="{{ route('myActivity') }}">Activity</a></li>
            </ul>
        </nav>
    </div>

    <div class="bg radius-md shadow-xs">
        <div class="max-width-md">
            <div class="padding-lg">
                <fieldset class="margin-bottom-xl margin-right-lg">
                    <legend class="margin-bottom-md font-medium text-md">Two Factor Authentication</legend>
                    <p class="margin-top-sm">Help protect your acount from unauthorized access by requiring a
                        second authentication method in addition to your password using <a
                            href="https://us.norton.com/internetsecurity-privacy-what-is-2fa.html" target="_blank">
                            two-factor authentication</a></p>
                    <div class="grid gap-lg text-center text-sm margin-y-lg">
                        <div class="col@lg">
                            <img src="{{ asset('img/password.png') }}" width="70" alt="icon">
                            <p class="margin-top-xs color-contrast-medium">Log in using your email and password.</p>
                        </div>
                        <div class="col@lg">
                            <img src="{{ asset('img/qr.png') }}" width="70" alt="icon">
                            <p class="margin-top-xs color-contrast-medium">Using a two-factor authentication app,
                                generate a passcode to verify your identity.</p>
                        </div>
                        <div class="col@lg">
                            <img src="{{ asset('img/passcode.png') }}" width="70" alt="icon">
                            <p class="margin-top-xs color-contrast-medium">Once you enter the passcode at the prompt,
                                you will be logged onto our web console.</p>
                        </div>
                    </div>

                    <div class="margin-bottom-md border-bottom border-contrast-low"></div>

                    @if (!auth()->user()->two_factor_secret)
                        <span class="badge badge--error font-medium text-sm">2FA is Off,
                            You will need to set this up</span>
                    @endif

                    <div class="grid gap-lg">
                        <div class="col-6@lg margin-top-md">
                            @if (!auth()->user()->two_factor_secret)
                            @else
                                First, you’ll need a 2FA authenticator app on your phone.
                                <strong class="font-medium"> If you don’t have one, we recommend</strong> <a
                                    href="https://authenticator.2stable.com/" target="_blank"
                                    rel="noopener noreferrer">2Stable</a>
                                <br><br>
                                You can download it free on the Apple App Store for iPhone, or Google Play Store for
                                Android. Please grab your phone, search the store, and install it now.
                                <br><br>
                                Once your authenticator app is installed, open the authenticator app, tap ”Scan QR
                                code” or ”+”, and, when it asks, point your phone’s camera at this QR code picture
                                on the right.
                            @endif
                        </div>
                        <div class="col-6@lg">
                            @if (auth()->user()->two_factor_secret)
                                <div>
                                    {!! auth()->user()->twoFactorQrCodeSvg() !!}
                                </div>
                                <small class="color-contrast-medium">Point your camera here</small>
                        </div>
                    </div>
                    <div class="padding-bottom-md border-bottom border-contrast-low">
                    </div>
                    <div class="margin-y-lg">
                        <div class="grid gap-lg">
                            <div class="col-6@lg">
                                <label class="inline-block padding-top-xs@lg" for="input-email">
                                    Store these recovery codes in a secure password manager or notes.
                                    They can be used to recover access to your account if your two factor authentication
                                    device is lost.
                                </label>
                            </div>
                            <div class="col-6@lg">
                                <div class="text-dark">
                                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                                        <li class="color-contrast-medium">{{ $code }}</li>
                                    @endforeach
                                    <div>
                                        <form action="{{ url('user/two-factor-recovery-codes') }}" method="POST">
                                            @csrf
                                            <div class="flex flex-wrap gap-xs margin-top-md">
                                                <button type="submit"
                                                    class="btn btn--subtle text-uppercase btn--sm font-medium">Regenerate
                                                    codes</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        @if (auth()->user()->two_factor_secret)
                                            <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            @if (!auth()->user()->two_factor_secret)
                <div class="max-width-md text-right">
                    <form action="{{ url('user/two-factor-authentication') }}" method="POST" class="mt-2">
                        @csrf
                        <div class="border-top border-contrast-lower padding-md text-right">
                            <button type="submit" class="btn btn--primary btn--md font-medium">Enable</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="border-top border-contrast-lower padding-md text-right">
                    <button class="btn btn--primary btn--md" aria-controls="disable">Disable</button>

                    <div id="disable"
                        class="modal modal--animate-translate-up flex flex-center bg-black bg-opacity-90% padding-md js-modal">
                        <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto bg radius-md inner-glow shadow-md"
                            role="alertdialog" aria-labelledby="modal-title" aria-describedby="modal-description">
                            <header
                                class="bg-contrast-lower bg-opacity-50% padding-y-sm padding-x-md flex items-center justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#e22054"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <p id="modal-title" class="text-truncate text-md font-medium"> Are you sure you want to
                                    disable?
                                </p>

                                <button
                                    class="reset modal__close-btn modal__close-btn--inner js-modal__close js-tab-focus">
                                    <svg class="icon icon--xs" viewBox="0 0 16 16">
                                        <title>Close modal window</title>
                                        <g stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10">
                                            <line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line>
                                            <line x1="2.5" y1="2.5" x2="13.5" y2="13.5">
                                            </line>
                                        </g>
                                    </svg>
                                </button>
                            </header>

                            <div class="padding-y-sm padding-x-md">
                                <div class="text-component">
                                    <p id="modal-description">Don’t turn off your 2FA due to inconvenience, adding the
                                        second factor gives an added layer of protection - and greater peace of mind.
                                    </p>
                                </div>
                            </div>

                            <footer class="padding-md">
                                <div class="flex justify-end gap-xs">
                                    <button class="btn btn--subtle js-modal__close">Cancel</button>
                                    <button type="submit" class="btn btn--accent">Disable</button>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            @endif
            </form>
        </div>
    </div>

</x-layout>
