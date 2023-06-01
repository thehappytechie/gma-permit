@section('title', 'Two-Factor Challenge')

<x-auth.section>

    <div class="min-height-100vh">
        <div class="bg radius-md shadow-sm padding-lg max-width-xx">
            <div class="text-center margin-bottom-md">
                <h1 class="text-xl font-semibold">Two-Factor Challenge</h1>
            </div>
            <div class="switch-card bg radius-md padding-md border inner-glow shadow-xxs js-switch-card">
                <div class="text-component">
                    <p class="text-sm color-contrast-medium">Please enter the
                        authentication code provided by your authenticator application</p>
                    <form action="{{ url('two-factor-challenge') }}" method="POST">
                        @csrf
                        <div class="margin-bottom-sm">
                            <label class="form-label margin-bottom-xs" for="code">Authentication code</label>
                            <input class="form-control width-100% @error('code') is-error @enderror" type="text"
                                name="code" id="code" placeholder="Enter authentication code" required>
                        </div>
                        @error('code')
                            <x-validation-error>{{ $message }}</x-validation-error>
                        @enderror
                        <div class="margin-bottom-lg">
                            <button type="submit" class="btn btn--primary font-medium width-100%">Confirm
                                code</button>
                        </div>
                    </form>
                    <div class="text-divider"><span>OR</span></div>
                    <p class="text-sm color-contrast-medium margin-top-sm">Please enter one of your emergency recovery codes provided</p>
                    <form action="{{ url('two-factor-challenge') }}" method="POST">
                        @csrf
                        <div class="margin-bottom-sm">
                            <label class="form-label margin-bottom-xs" for="recovery_code">Recovery code</label>
                            <input class="form-control width-100%  @error('recovery_code') is-error @enderror"
                                type="text" name="recovery_code" id="recovery_code" placeholder="Enter recovery code"
                                required>
                        </div>
                        @error('recovery_code')
                            <x-validation-error>{{ $message }}</x-validation-error>
                        @enderror
                        <div class="margin-bottom-sm">
                            <button type="submit" class="btn btn--primary font-medium width-100%">Confirm
                                code</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center margin-top-md">
                <p class="text-sm"><a href="{{ route('login') }}">&larr; Back to login</a></p>
            </div>
        </div>
    </div>

</x-auth.section>
