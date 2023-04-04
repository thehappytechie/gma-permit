@section('title', 'Reset Password')

<x-auth.section>

    <x-alert />

    <div class="min-height-100vh">
        <form action="{{ route('password.update') }}" method="POST"
            class="bg radius-md shadow-sm padding-lg max-width-xx">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="text-center margin-bottom-md">
                <h1 class="text-xl font-bold">Reset your password</h1>
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
                    <label class="form-label" for="inputPassword1"><span class="tooltip-trigger js-tooltip-trigger"
                            title="Ensure your new password is 8 characters, contain one number, and one special character.">Password</span></label>
                </div>
                <input class="form-control width-100% @error('email') is-error @enderror" type="password"
                    name="password" id="inputPassword" required>
            </div>
            @error('password')
            <x-validation-error>{{ $message }}</x-validation-error>
            @enderror
            <div class="margin-bottom-sm">
                <div class="flex justify-between margin-bottom-xxs">
                    <label class="form-label" for="inputPassword1">Confirm Password</label>
                </div>
                <input class="form-control width-100%" type="password" name="password_confirmation" id="inputPassword"
                    required>
            </div>
            <div class="margin-bottom-lg">
                <button type="submit" class="btn btn--primary btn--md width-100%">Change password</button>
            </div>
            <div class="text-center">
                <p class="text-sm"><a href="{{ route('login') }}">&larr; Back to login</a></p>
            </div>
        </form>
    </div>

</x-auth.section>
