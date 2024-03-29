@section('title', 'Edit company')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Edit - {{ ucwords(strtolower($company->name)) }}</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs margin-bottom-xl">
        <form action="{{ route('company.update', $company->id) }}" method="post">
            @csrf
            @method('put')
            <div class="grid gap-lg max-width-sm">
                <a href="{{ route('companyDatatable') }}">&larr; Go to companies</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                    Company name <x-required-label></x-required-label>
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ $company->name }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="address">
                        Address
                    </label>
                    <input class="form-control width-100% @error('address') is-error @enderror" type="text"
                        name="address" id="address" value="{{ $company->address }}">
                    @error('address')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="email">
                        Email
                    </label>
                    <input class="form-control width-100% @error('email') is-error @enderror" type="email"
                        name="email" id="email" value="{{ $company->email }}">
                    @error('email')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="contact">
                        Contact
                    </label>
                    <input class="form-control width-100% @error('contact') is-error @enderror" type="text"
                        name="contact" id="contact" value="{{ $company->contact }}">
                    @error('contact')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="registry_port">
                        Registry port
                    </label>
                    <input class="form-control width-100% @error('registry_port') is-error @enderror" type="text"
                        name="registry_port" id="registry_port" value="{{ $company->registry_port }}">
                    @error('registry_port')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="gross_tonnage">
                        Gross tonnage
                    </label>
                    <input class="form-control width-100% @error('gross_tonnage') is-error @enderror" type="number"
                        name="gross_tonnage" id="gross_tonnage" value="{{ $company->gross_tonnage }}">
                    @error('gross_tonnage')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="call_sign">
                        Call sign
                    </label>
                    <input class="form-control width-100% @error('call_sign') is-error @enderror" type="number"
                        name="call_sign" id="call_sign" value="{{ $company->call_sign }}">
                    @error('call_sign')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="vessel_number">
                        Vessel number
                    </label>
                    <input class="form-control width-100% @error('vessel_number') is-error @enderror" type="text"
                        name="vessel_number" id="vessel_number" value="{{ $company->vessel_number }}">
                    @error('vessel_number')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="imo_number">
                        IMO number
                    </label>
                    <input class="form-control width-100% @error('imo_number') is-error @enderror" type="text"
                        name="imo_number" id="imo_number" value="{{ $company->imo_number }}">
                    @error('imo_number')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md">Update company</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
