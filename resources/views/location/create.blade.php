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
                    <label class="form-label margin-bottom-xxs" for="country">
                        <x-required-label></x-required-label> Country
                    </label>
                    <div class="select">
                        <select class="form-control width-100% @error('country') is-error @enderror select__input"
                            name="country" required>
                            <option value="">Select country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" />
                    </svg>
                    @error('status')
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

</x-layout>
