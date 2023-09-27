@section('title', 'Edit permit')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Edit - {{ $permit->company->name }}</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs margin-bottom-xl">
        <form action="{{ route('permit.update', $permit->id) }}" method="post">
            @csrf
            @method('put')
            <div class="grid gap-lg max-width-sm">
                <a href="{{ route('permitDatatable') }}">&larr; Go to permits</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <x-select-dropdown>
                        <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                            Company name <x-required-label></x-required-label>
                        </label>
                        <select name="company_id"
                            class="form-control width-100% js-select-auto__select @error('company_id') is-error @enderror"
                            required>
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ old('company_id', $permit->company_id) ==
                                $company->id ?
                                'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                            @endforeach
                        </select>
                    </x-select-dropdown>
                </div>
                <div class="col-6@md">
                    <div class="select">
                        <label class="form-label margin-bottom-xxs" for="permit_type">
                            Permit type <x-required-label></x-required-label>
                        </label>
                        <select name="permit_type"
                            class="form-control select__input width-100% @error('permit_type') is-error @enderror"
                            required>
                            <option value="{{ $permit->permit_type }}">{{ $permit->permit_type }}</option>
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
                        Permit number <x-required-label></x-required-label>
                    </label>
                    <input class="form-control width-100% @error('permit_number') is-error @enderror" type="text"
                        name="permit_number" id="permit_number" value="{{ $permit->permit_number }}" required>
                    @error('permit_number')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <x-select-dropdown>
                        <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                            Permit unit name <x-required-label></x-required-label>
                        </label>
                        <select name="permit_unit_id"
                            class="form-control width-100% js-select-auto__select @error('permit_unit_id') is-error @enderror"
                            required>
                            @foreach ($permitUnits as $permitUnit)
                            <option value="{{ $permitUnit->id }}" {{ old('permit_unit_id', $permit->permit_unit_id) ==
                                $permitUnit->id ?
                                'selected' : '' }}>
                                {{ $permitUnit->name }}
                            </option>
                            @endforeach
                        </select>
                    </x-select-dropdown>
                </div>

                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="vessel_name">
                        Vessel name
                    </label>
                    <input class="form-control width-100% @error('vessel_name') is-error @enderror" type="text"
                        name="vessel_name" id="vessel_name" value="{{ $permit->vessel_name }}">
                    @error('vessel_name')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="registry_port">
                        Registry port
                    </label>
                    <input class="form-control width-100% @error('registry_port') is-error @enderror" type="text"
                        name="registry_port" id="registry_port" value="{{ $permit->registry_port }}">
                    @error('registry_port')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="gross_tonnage">
                        Gross tonnage
                    </label>
                    <input class="form-control width-100% @error('gross_tonnage') is-error @enderror" type="text"
                        name="gross_tonnage" id="gross_tonnage" value="{{ $permit->gross_tonnage }}">
                    @error('gross_tonnage')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="imo_number">
                        IMO number
                    </label>
                    <input class="form-control width-100% @error('imo_number') is-error @enderror" type="text"
                        name="imo_number" id="imo_number" value="{{ $permit->imo_number }}">
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
                        name="call_sign" id="call_sign" value="{{ $permit->call_sign }}">
                    @error('call_sign')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="issue_date">
                        Issue date <x-required-label></x-required-label>
                    </label>
                    <input class="form-control width-100% @error('issue_date') is-error @enderror" type="date"
                        name="issue_date" id="issue_date" value="{{ $permit->issue_date }}" required>
                    @error('issue_date')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="expiry_date">
                        Expiry date <x-required-label></x-required-label>
                    </label>
                    <input class="form-control width-100% @error('expiry_date') is-error @enderror" type="date"
                        name="expiry_date" id="expiry_date" value="{{ $permit->expiry_date }}" required>
                    @error('expiry_date')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--accent btn--md margin-right-md" aria-controls="disable">Delete</button>
                        <button class="btn btn--primary btn--md">Update permit</button>
                    </div>
                </div>
            </div>
        </form>
        <div id="disable"
            class="modal modal--animate-translate-up flex flex-center bg-black bg-opacity-90% padding-md js-modal">
            <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto bg radius-md inner-glow shadow-md"
                role="alertdialog" aria-labelledby="modal-title" aria-describedby="modal-description">
                <header
                    class="bg-contrast-lower bg-opacity-50% padding-y-sm padding-x-md flex items-center justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#e22054" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <p id="modal-title" class="text-truncate text-md font-medium"> Are you sure you want
                        to
                        delete?
                    </p>

                    <button class="reset modal__close-btn modal__close-btn--inner js-modal__close js-tab-focus">
                        <svg class="icon icon--xs" viewBox="0 0 16 16">
                            <title>Close modal window</title>
                            <g stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-miterlimit="10">
                                <line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line>
                                <line x1="2.5" y1="2.5" x2="13.5" y2="13.5">
                                </line>
                            </g>
                        </svg>
                    </button>
                </header>

                <div class="padding-y-sm padding-x-md">
                    <div class="text-component">
                        <p id="modal-description">This will permanently delete this item. You can’t undo
                            this action.
                        </p>
                    </div>
                </div>

                <footer class="padding-md">
                    <div class="flex justify-end gap-xs">
                        <button class="btn btn--subtle js-modal__close">Cancel</button>
                        <form action="{{ route('permit.destroy', $permit->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn--accent">Delete</button>
                        </form>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/select-dropdown.js') }}"></script>

</x-layout>
