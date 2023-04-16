@section('title', 'Create company')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Create company</h1>
    </div>

    <div class="bg radius-md shadow-xs">
        <form action="{{ route('company.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm padding-lg">
                <a href="{{ route('companyDatatable') }}">&larr; Go to companies</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label></x-required-label>Company name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="address">
                        Address
                    </label>
                    <input class="form-control width-100% @error('address') is-error @enderror" type="text"
                        name="address" id="address" value="{{ old('contact') }}">
                    @error('address')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="email">
                        Email
                    </label>
                    <input class="form-control width-100% @error('email') is-error @enderror" type="email"
                        name="email" id="email" value="{{ old('email') }}">
                    @error('email')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="contact">
                        Contact
                    </label>
                    <input class="form-control width-100% @error('contact') is-error @enderror" type="text"
                        name="contact" id="contact" value="{{ old('contact') }}">
                    @error('contact')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="registry_port">
                        Registry port
                    </label>
                    <input class="form-control width-100% @error('registry_port') is-error @enderror" type="text"
                        name="registry_port" id="registry_port" value="{{ old('registry_port') }}">
                    @error('registry_port')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="gross_tonnage">
                        Gross tonnage
                    </label>
                    <input class="form-control width-100% @error('gross_tonnage') is-error @enderror" type="number"
                        name="gross_tonnage" id="gross_tonnage" value="{{ old('gross_tonnage') }}">
                    @error('gross_tonnage')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="call_sign">
                        Call sign
                    </label>
                    <input class="form-control width-100% @error('call_sign') is-error @enderror" type="number"
                        name="call_sign" id="call_sign" value="{{ old('call_sign') }}">
                    @error('call_sign')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="vessel_number">
                        Vessel number
                    </label>
                    <input class="form-control width-100% @error('vessel_number') is-error @enderror" type="text"
                        name="vessel_number" id="vessel_number" value="{{ old('vessel_number') }}">
                    @error('vessel_number')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="imo_number">
                        IMO number
                    </label>
                    <input class="form-control width-100% @error('imo_number') is-error @enderror" type="text"
                        name="imo_number" id="imo_number" value="{{ old('imo_number') }}">
                    @error('imo_number')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md">Create company</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
