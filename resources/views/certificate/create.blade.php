@section('title', 'Create certificate')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Create certificate</h1>
    </div>

    <div class="bg radius-md shadow-xs">
        <form action="{{ route('certificate.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm padding-lg">
                <a href="{{ route('certificate.index') }}">&larr; Go to certificates</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label></x-required-label>Vessel name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                        <x-required-label>
                        </x-required-label>Agent name
                    </label>
                    <select name="vessel_id" class="js-choice @error('vessel_id') is-error @enderror" required>
                        <option value="" disabled selected>Please select</option>
                        @foreach ($vessels as $vessel)
                            <option value="{{ $vessel->id }}" {{ old('vessel_id') == $vessel->id ? 'selected' : '' }}>
                                {{ $vessel->name }}</option>
                        @endforeach
                    </select>
                    @error('vessel_id')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="issue_date">
                        Issue date
                    </label>
                    <input class="form-control width-100% @error('issue_date') is-error @enderror" type="date"
                        name="issue_date" id="issue_date" value="{{ old('issue_date') }}">
                    @error('issue_date')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="expiry_date">
                        Expiry date
                    </label>
                    <input class="form-control width-100% @error('expiry_date') is-error @enderror" type="date"
                        name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}">
                    @error('expiry_date')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md">Create certificate</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/choices.min.js') }}"></script>

    <script>
        const choices = new Choices('.js-choice');
    </script>

</x-layout>
