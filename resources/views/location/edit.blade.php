@section('title', 'Edit location')

<x-layout>

    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Edit - {{ $location->name }}</h2>
    </div>
    <div class="bg radius-md shadow-xs">
        <form action="{{ route('location.update', $location->id) }}" method="post">
            @csrf
            @method('put')
            <div class="grid gap-lg max-width-sm padding-lg">
                <a href="{{ route('locationDatatable') }}">&larr; Go to locations</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">Branch name</label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ $location->name }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="address">Address</label>
                    <input class="form-control width-100%  @error('address') is-error @enderror" type="text"
                        name="address" id="address" value="{{ $location->address }}">
                    @error('address')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="city">City</label>
                    <input class="form-control width-100%  @error('city') is-error @enderror" type="text"
                        name="city" id="city" value="{{ $location->city }}">
                    @error('city')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="state">State</label>
                    <input class="form-control width-100%  @error('state') is-error @enderror" type="text"
                        name="state" id="state" value="{{ $location->state }}">
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
                            wname="country">
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
                        <button class="btn btn--primary">Create role</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
