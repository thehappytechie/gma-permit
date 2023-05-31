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
                                <strong> If you don’t have one, we recommend</strong> <a
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
                                                    class="btn btn--subtle text-uppercase btn--sm">Regenerate
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
                            <button type="submit" class="btn btn--primary btn--md">Enable</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="border-top border-contrast-lower padding-md text-right">
                    <button type="submit" class="btn btn--accent btn--md">Disable</button>
                </div>
            @endif
            </form>
        </div>
    </div>

</x-layout>
