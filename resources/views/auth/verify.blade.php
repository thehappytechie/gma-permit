@section('title', 'Verify email')

<x-auth.section>

    <x-alert />

    <form action="{{ url('email/verification-notification') }}" method="post"
        class="bg radius-md shadow-sm padding-lg max-width-xx">
        @csrf
        <div class="text-center margin-bottom-md">
            <h1 class="text-xl font-bold">Verify your email</h1>
            <p class="text-center text-sm color-contrast-medium max-width-xxxs padding-xs">Please enter the email
                address you used to create the account to receive your verification code.</p>
        </div>
        <div class="margin-bottom-sm">
            <label class="form-label margin-bottom-xs" for="input-password">Email</label>
            <input class="form-control width-100%  @error('email') is-error @enderror" type="email" name="email"
                id="input-email" required>
        </div>
        @error('email')
        <x-validation-error>{{ $message }}</x-validation-error>
        @enderror
        <div class="margin-y-md">
            <button type="submit" class="btn btn--primary btn--md width-100%">Request verification link</button>
        </div>
    </form>

</x-auth.section>
