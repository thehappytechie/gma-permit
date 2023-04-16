@section('title', 'Create permit')

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
                    <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                        <x-required-label></x-required-label>Company name
                    </label>
                    <select name="company_id" class="js-choice @error('company_id') is-error @enderror" required>
                        <option value="" disabled selected>Please select</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}"
                                {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}</option>
                        @endforeach
                    </select>
                    @error('company_id')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <div class="select">
                        <label class="form-label margin-bottom-xxs" for="permit_type">
                            <x-required-label></x-required-label>Permit type
                        </label>
                        <select name="permit_type"
                            class="form-control select__input width-100% @error('permit_type') is-error @enderror"
                            required>
                            <option value="">Please select</option>
                            <option value="operating permit">Operating permit</option>
                            <option value="safety permit">Safety permit</option>
                        </select>
                    </div>
                    <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" />
                    </svg>
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
                    <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                        <x-required-label></x-required-label>Permit unit
                    </label>
                    <select name="permit_unit_id" class="js-choice @error('permit_unit_id') is-error @enderror"
                        required>
                        <option value="" disabled selected>Please select</option>
                        @foreach ($permitUnits as $permitUnit)
                            <option value="{{ $permitUnit->id }}"
                                {{ old('permit_unit_id') == $permitUnit->id ? 'selected' : '' }}>
                                {{ $permitUnit->name }}</option>
                        @endforeach
                    </select>
                    @error('permit_unit_id')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="vessel_name">
                        Vessel name
                    </label>
                    <input class="form-control width-100% @error('vessel_name') is-error @enderror" type="text"
                        name="vessel_name" id="vessel_name" value="{{ old('vessel_name') }}">
                    @error('vessel_name')
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
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="imo_number">
                        IMO number
                    </label>
                    <input class="form-control width-100% @error('imo_number') is-error @enderror" type="number"
                        name="imo_number" id="imo_number" value="{{ old('imo_number') }}">
                    @error('imo_number')
                        issue_date
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="call_sign">
                        Call sign
                    </label>
                    <input class="form-control width-100% @error('call_sign') is-error @enderror" type="text"
                        name="call_sign" id="call_sign" value="{{ old('call_sign') }}">
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

    <script src="{{ asset('js/choices.min.js') }}"></script>

    <script>
        const choices = new Choices('.js-choice');
    </script>

</x-layout>
