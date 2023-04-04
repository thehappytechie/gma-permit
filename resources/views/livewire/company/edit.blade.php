@section('title', 'Edit Company')

<div>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Edit Company</h1>
    </div>

    <div class="bg radius-md shadow-xs">
        <div class="grid gap-lg max-width-sm padding-lg">
            <div class="col-6"> <a href="{{ route('companyDatatable') }}">&larr; Go to companies</a>
            </div>
            <div class="col-6 text-right"><a href="show" class="btn btn--dark btn--sm">
                Back to company</a></div>
            <small class="color-contrast-medium">
                <x-required-label></x-required-label>indicates a required field
            </small>
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="name">
                    <x-required-label></x-required-label> Name
                </label>
                <input wire:model="name" class="form-control width-100% @error('name') is-error @enderror"
                    type="text">
                @error('name')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="email">
                    Email
                </label>
                <input wire:model="email" class="form-control width-100% @error('email') is-error @enderror"
                    type="email">
                @error('email')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-4@md">
                <label class="form-label margin-bottom-xxs" for="contact">
                    Contact
                </label>
                <input wire:model="contact" class="form-control width-100% @error('contact') is-error @enderror"
                    type="tel" id="contact" value="{{ old('contact') }}">
                @error('contact')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-4@md">
                <label class="form-label margin-bottom-xxs" for="phone">
                    Phone
                </label>
                <input wire:model="phone" class="form-control width-100% @error('phone') is-error @enderror"
                    type="tel" id="phone" value="{{ old('phone') }}">
                @error('phone')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-4@md">
                <label class="form-label margin-bottom-xxs" for="address">
                    <x-required-label></x-required-label> Address
                </label>
                <input wire:model="address" class="form-control width-100% @error('address') is-error @enderror"
                    type="text" id="address" value="{{ old('address') }}">
                @error('address')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="country">
                    <x-required-label></x-required-label> Country
                </label>
                <div class="select">
                    <select class="form-control width-100% @error('country') is-error @enderror select__input"
                        wire:model="country">
                        <option value="">Select company</option>
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
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="vat_number">
                    Vat number
                </label>
                <input wire:model="vat_number" class="form-control width-100% @error('vat_number') is-error @enderror"
                    type="text" id="vat_number" value="{{ old('vat_number') }}">
                @error('vat_number')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="border-top border-contrast-lower text-right">
                <div class="margin-top-sm">
                    <button wire:click.prevent="save" class="btn btn--primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
