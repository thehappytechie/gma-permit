@section('title', 'Log In')

<x-auth.section>

    <x-alert />

    <form action="{{ route('login') }}" method="POST" class="bg radius-md shadow-sm padding-lg">
        @csrf
        <div class="text-center margin-bottom-md">
            <h1 class="text-xl font-semibold">Log In</h1>
            <p class="color-contrast-medium text-sm">to access your dashboard</p>
        </div>
        <div class="margin-bottom-sm">
            <label for="email" class="form-label margin-bottom-xxs">Email</label>
            <input class="form-control width-100% @error('email') is-error @enderror" type="email" name="email"
                id="email" autocomplete="email" required>
                @error('email')
                <x-validation-error>{{ $message }}</x-validation-error>
            @enderror
        </div>

        <div class="margin-bottom-sm">
            <div class="flex justify-between margin-bottom-xxs">
                <label for="password" class="form-label">
                    Password</label>
                <span class="text-sm"><a href="{{ url('forgot-password') }}">Forgot?</a></span>
            </div>
            <input class="form-control width-100%" type="password" name="password" id="password"
                autocomplete="current-password" required>
        </div>
        <div class="margin-y-md">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember"><span class="text-sm padding-top-lg color-contrast-medium">Remember me</span></label>
        </div>
        <div class="margin-bottom-lg">
            <button type="submit" class="btn btn--primary btn--md font-medium width-100%">Login</button>
        </div>
        <div class="text-center">
            <p class="text-sm color-contrast-medium">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </form>
    <div class="margin-top-xxl">
        <p class="text-center text-xs">
            <span class="color-contrast-medium">&copy; Ghana Maritime Authority</span>
            <a href="{{ route('terms') }}" class="color-contrast-medium" target="__blank">Terms</a> | <a
                href="{{ route('privacy') }}" class="color-contrast-medium" target="__blank">Privacy Policy</a>
        </p>
    </div>

</x-auth.section>
