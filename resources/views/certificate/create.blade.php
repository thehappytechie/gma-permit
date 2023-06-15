@section('title', 'Create certificate')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Create Certificate</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs margin-bottom-xl">
        <form action="{{ route('certificate.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm">
                <a href="{{ route('certificateDatatable') }}">&larr; Go to certificates</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label></x-required-label>Certificate name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <x-select-dropdown>
                        <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                            <x-required-label></x-required-label> Vessel name
                        </label>
                        <!-- select -->
                        <select name="vessel_id"
                            class="form-control width-100% js-select-auto__select @error('vessel_id') is-error @enderror"
                            required>
                            <option value="" disabled selected >Please select</option>
                            @foreach ($vessels as $vessel)
                                <option value="{{ $vessel->id }}">
                                    {{ $vessel->name }}</option>
                            @endforeach
                        </select>
                    </x-select-dropdown>
                    @error('vessel_id')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="issue_date">
                        <x-required-label></x-required-label> Issue date
                    </label>
                    <input class="form-control width-100% @error('issue_date') is-error @enderror" type="date"
                        name="issue_date" id="issue_date" value="{{ old('issue_date') }}" required>
                    @error('issue_date')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="expiry_date">
                        <x-required-label></x-required-label> Expiry date
                    </label>
                    <input class="form-control width-100% @error('expiry_date') is-error @enderror" type="date"
                        name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}" required>
                    @error('expiry_date')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md font-medium">Create certificate</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/select-dropdown.js') }}"></script>

</x-layout>
