@section('title', 'Reset Password')

<x-auth.section>

    <x-alert />

    <div class="min-height-100vh">
        <form action="{{ route('password.update') }}" method="POST"
            class="bg radius-md shadow-sm padding-lg max-width-xx">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="text-center margin-bottom-md">
                <h1 class="text-xl font-semibold">Reset your password</h1>
            </div>
            <div class="margin-bottom-sm">
                <label class="form-label margin-bottom-xxs" for="email">Email</label>
                <input class="form-control width-100%  @error('email') is-error @enderror" type="email" name="email"
                    id="email" value="{{ $request->email }}">
            </div>
            @error('email')
            <x-validation-error>{{ $message }}</x-validation-error>
            @enderror
            <div class="margin-bottom-sm">
                <div class="flex justify-between margin-bottom-xxs">
                    <label class="form-label" for="password"><span class="tooltip-trigger js-tooltip-trigger"
                            title="Ensure your password contain 8 characters, 1 uppercase, 1 number & 1 special character">Password</span></label>
                </div>
                <input class="form-control width-100% @error('email') is-error @enderror" type="password"
                    name="password" id="password" required>
            </div>
            @error('password')
            <x-validation-error>{{ $message }}</x-validation-error>
            @enderror
            <div class="margin-bottom-sm">
                <div class="flex justify-between margin-bottom-xxs">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                </div>
                <input class="form-control width-100%" type="password" name="password_confirmation" id="password_confirmation"
                    required>
            </div>
            <div class="margin-bottom-lg">
                <button type="submit" class="btn btn--primary btn--md font-medium width-100%">Change password</button>
            </div>
            <div class="text-center">
                <p class="text-sm"><a href="{{ route('login') }}">&larr; Back to login</a></p>
            </div>
        </form>
    </div>

</x-auth.section>
