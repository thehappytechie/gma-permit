@section('title', 'Create location')

<x-layout>

    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Create Location</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs margin-bottom-xl">
        <form action="{{ route('location.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm">
                <a href="{{ route('locationDatatable') }}">&larr; Go to locations</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label></x-required-label>Branch name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="address">Address</label>
                    <input class="form-control width-100%  @error('address') is-error @enderror" type="text"
                        name="address" id="address" value="{{ old('address') }}">
                    @error('address')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="city">City</label>
                    <input class="form-control width-100%  @error('city') is-error @enderror" type="text"
                        name="city" id="city" value="{{ old('city') }}">
                    @error('city')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="state">State</label>
                    <input class="form-control width-100%  @error('state') is-error @enderror" type="text"
                        name="state" id="state" value="{{ old('state') }}">
                    @error('state')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <x-select-dropdown>
                        <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                            <x-required-label></x-required-label>Country
                        </label>
                        <!-- select -->
                        <select name="country"
                            class="form-control width-100% js-select-auto__select @error('country') is-error @enderror"
                            required>
                            <option value="" disabled selected>Please select</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country }}">
                                    {{ $country }}</option>
                            @endforeach
                        </select>
                    </x-select-dropdown>
                    @error('country')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>

                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md font-medium">Create location</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/select-dropdown.js') }}"></script>

</x-layout>
