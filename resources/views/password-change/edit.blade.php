@section('title', 'Change password')

<x-auth.section>

    <form action="{{ route('password-change.update', $user->id) }}" method="post"
        class="bg radius-md padding-md shadow-xs col-12">
        @csrf
        @method('PUT')
        <div class="text-center margin-bottom-md">
            <h1 class="text-xl font-bold">Change your password</h1>
            <p class="text-center color-contrast-medium max-width-xxxs padding-xs text-sm">Please change your password
                before
                logging in the first time</p>
        </div>
        <div class="margin-bottom-sm">
            <div class="flex justify-between margin-bottom-xs">
                <label class="form-label" for="password"><span class="tooltip-trigger js-tooltip-trigger"
                        title="Ensure your new password is 8 characters, contain one number, and one special character.">Password</span></label>
            </div>
            <input class="form-control width-100% @error('password') is-error @enderror" type="password" name="password"
                id="password" required>
        </div>
        @error('password')
            <x-validation-error>{{ $message }}</x-validation-error>
        @enderror
        <div class="margin-bottom-sm">
            <div class="flex justify-between margin-bottom-xs">
                <label class="form-label" for="password_confirmation">Confirm Password</label>
            </div>
            <input class="form-control width-100%" type="password" name="password_confirmation"
                id="password_confirmation" required>
        </div>
        <div class="margin-bottom-lg">
            <button type="submit" class="btn btn--primary btn--md width-100%">Change password</button>
        </div>
        <div class="text-center">
            <p class="text-sm">Already have an account? <a href="{{ route('signout') }}">Login</a></p>
        </div>
    </form>

</x-auth.section>
