@section('title', 'Edit certificate')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Edit - {{ $certificate->vessel->name }}</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs margin-bottom-xl">
        <form action="{{ route('certificate.update', $certificate->id) }}" method="post">
            @csrf
            @method('put')
            <div class="grid gap-lg max-width-sm">
                <a href="{{ route('editCertificateDatatable') }}">&larr; Go to certificates</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        Certificate name <x-required-label></x-required-label>
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text" name="name"
                        id="name" value="{{ $certificate->name }}" required>
                    @error('name')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <x-select-dropdown>
                        <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                            Vessel name <x-required-label></x-required-label>
                        </label>
                        <select name="vessel_id"
                            class="form-control width-100% js-select-auto__select @error('vessel_id') is-error @enderror"
                            required>
                            @foreach ($vessels as $vessel)
                            <option value="{{ $vessel->id }}" {{ old('vessel_id', $certificate->vessel_id) ==
                                $vessel->id ?
                                'selected' : '' }}>
                                {{ $vessel->name }}
                            </option>
                            @endforeach
                        </select>
                    </x-select-dropdown>
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="issue_date">
                        Issue date <x-required-label></x-required-label>
                    </label>
                    <input class="form-control width-100% @error('issue_date') is-error @enderror" type="date"
                        name="issue_date" id="issue_date" value="{{ $certificate->issue_date }}">
                    @error('issue_date')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="expiry_date">
                        Expiry date <x-required-label></x-required-label>
                    </label>
                    <input class="form-control width-100% @error('expiry_date') is-error @enderror" type="date"
                        name="expiry_date" id="expiry_date" value="{{ $certificate->expiry_date }}">
                    @error('expiry_date')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--accent btn--md margin-right-md" aria-controls="disable">Delete</button>
                        <button type="submit" class="btn btn--primary btn--md">Update certificate</button>
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
                        <form action="{{ route('certificate.destroy', $certificate->id) }}" method="POST">
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
