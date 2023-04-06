@section('title', 'Create certificate')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Create permit</h1>
    </div>

    <div class="bg radius-md shadow-xs">
        <form action="{{ route('permit.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm padding-lg">
                <a href="{{ route('permitUnitDatatable') }}">&larr; Go to permits</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label></x-required-label>Permit unit name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="permit_type">
                        <x-required-label></x-required-label>Permit type
                    </label>
                    <input class="form-control width-100% @error('permit_type') is-error @enderror" type="text"
                        name="permit_type" id="permit_type" value="{{ old('permit_type') }}" required>
                    @error('permit_type')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="permit_number">
                        <x-required-label></x-required-label>Permit number
                    </label>
                    <input class="form-control width-100% @error('permit_number') is-error @enderror" type="text"
                        name="permit_number" id="permit_number" value="{{ old('permit_number') }}" required>
                    @error('permit_number')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label></x-required-label>Permit unit name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="Vessel name">
                        <x-required-label></x-required-label>Vessel name
                    </label>
                    <input class="form-control width-100% @error('vessel_name') is-error @enderror" type="text"
                        name="vessel_name" id="vessel_name" value="{{ old('vessel_name') }}" required>
                    @error('vessel_name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="registry_port">
                        <x-required-label></x-required-label>Registry port
                    </label>
                    <input class="form-control width-100% @error('registry_port') is-error @enderror" type="text"
                        name="registry_port" id="registry_port" value="{{ old('registry_port') }}" required>
                    @error('registry_port')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="gross_tonnage">
                        <x-required-label></x-required-label>Gross tonnage
                    </label>
                    <input class="form-control width-100% @error('gross_tonnage') is-error @enderror" type="text"
                        name="gross_tonnage" id="gross_tonnage" value="{{ old('gross_tonnage') }}" required>
                    @error('gross_tonnage')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="imo_number">
                        <x-required-label></x-required-label>IMO number
                    </label>
                    <input class="form-control width-100% @error('imo_number') is-error @enderror" type="text"
                        name="imo_number" id="imo_number" value="{{ old('imo_number') }}" required>
                    @error('imo_number')issue_date
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="call_sign">
                        <x-required-label></x-required-label>Call sign
                    </label>
                    <input class="form-control width-100% @error('call_sign') is-error @enderror" type="text"
                        name="call_sign" id="call_sign" value="{{ old('call_sign') }}" required>
                    @error('call_sign')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="issue_date">
                        <x-required-label></x-required-label>Issue date
                    </label>
                    <input class="form-control width-100% @error('issue_date') is-error @enderror" type="date"
                        name="issue_date" id="issue_date" value="{{ old('issue_date') }}" required>
                    @error('issue_date')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="expiry_date">
                        <x-required-label></x-required-label>Expiry date
                    </label>
                    <input class="form-control width-100% @error('expiry_date') is-error @enderror" type="date"
                        name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}" required>
                    @error('expiry_date')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md">Create permit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
