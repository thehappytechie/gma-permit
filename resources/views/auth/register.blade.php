@section('title', 'Register')

<x-auth.section>

    <x-alert />

    <form action="{{ route('register') }}" method="POST" class="bg radius-md shadow-sm padding-lg" autocomplete="on">
        @csrf
        <div class="text-center margin-bottom-md">
            <h1 class="text-xl font-semibold">Create account</h1>
        </div>
        <div class="margin-bottom-sm">
            <label class="form-label margin-bottom-xxs" for="name">Full name</label>
            <input class="form-control width-100% @error('name') is-error @enderror" type="text" name="name"
                value="{{ old('name') }}" id="name" required>
            <p class="text-xs margin-top-xs color-contrast-medium">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="#000"
                    class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                </svg> Name as seen on your passport or National ID
            </p>
        </div>
        @error('name')
            <x-validation-error>{{ $message }}</x-validation-error>
        @enderror
        <div class="margin-y-sm">
            <label class="form-label margin-bottom-xxs" for="email">Email</label>
            <input class="form-control width-100% @error('email') is-error @enderror" type="email" name="email"
                id="email" value="{{ old('email') }}" required>
        </div>
        @error('email')
            <x-validation-error>{{ $message }}</x-validation-error>
        @enderror
        <div class="margin-y-sm">
            <label class="form-label margin-bottom-xxs" for="password">Password</label>
            <input class="form-control width-100% @error('password') is-error @enderror" type="password" name="password"
                id="password" required>
            <p class="text-xs margin-top-xs color-contrast-medium">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="#000"
                    class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                </svg> Contain 8 characters, 1 uppercase, 1 number & 1 special character
            </p>
        </div>
        @error('password')
            <x-validation-error>{{ $message }}</x-validation-error>
        @enderror
        <div class="margin-bottom-sm">
            <div class="flex justify-between margin-bottom-xxs">
                <label class="form-label" for="password_confirm">Confirm password</label>
            </div>
            <input class="form-control width-100%" type="password" name="password_confirmation" id="password_confirm"
                required>
        </div>
        <div class="margin-y-lg">
            <p class="text-sm color-contrast-medium">
                By registering I confirm I have read and agree to our <a href="{{ route('terms') }}"
                    target="_blank">terms of service</a> and <a href="{{ route('privacy') }}" target="_blank">privacy
                    policy</a>
            </p>
        </div>
        <div class="margin-bottom-lg">
            <button type="submit" class="btn btn--primary font-medium btn--md width-100%">Register</button>
        </div>
        <div class="text-center">
            <p class="text-sm color-contrast-medium">Already have an account? <a href="{{ route('login') }}">Log in</a>
            </p>
        </div>
    </form>

</x-auth.section>
