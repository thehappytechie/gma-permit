@section('title', 'Confirm Password')

<x-auth.section>

    <form action="{{ url('user/confirm-password') }}" method="post"
        class="bg radius-md shadow-sm padding-lg max-width-xx">
        @csrf
        <div class="text-center margin-bottom-md">
            <h1 class="text-xl font-bold">Confirm access</h1>
        </div>
        <div class="margin-bottom-sm">
            <label class="form-label margin-bottom-xs" for="password">Password</label>
            <input class="form-control width-100% @error('password') is-error @enderror" type="password" name="password"
                id="password" required>
        </div>
        @error('password')
            <x-validation-error>{{ $message }}</x-validation-error>
        @enderror
        <div class="margin-bottom-lg">
            <button type="submit" class="btn btn--primary btn--md width-100%">Confirm password</button>
        </div>

        <div class="text-center">
            <p class="text-sm"><a href="{{ route('dashboard') }}">&larr; Back to dashboard</a></p>
        </div>
    </form>

</x-auth.section>
