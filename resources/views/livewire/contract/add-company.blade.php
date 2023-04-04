<div class="col-6@md">
    <label class="form-label margin-bottom-xxs" for="company">
        <x-required-label></x-required-label>Contractor
    </label>
    <div class="select">
        <select wire:model="company_id" class="form-control width-100% @error('company_id') is-error @enderror">
            <option value="">Select contractor</option>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ ucfirst($company->name) }}</option>
            @endforeach
        </select>
    </div>
    <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
            stroke-linejoin="round" stroke-width="2" />
    </svg>
    @error('company_id')
        <x-validation-error>{{ $message }}</x-validation-error>
    @enderror
    <button class="btn btn--sm margin-top-xxs" aria-controls="add-company">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="hsl(210deg 100% 52%)" class=""
            viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
        </svg>
    </button>

    <div wire:ignore.self id="add-company"
        class="modal modal--animate-translate-up flex flex-center bg-black bg-opacity-90% padding-md js-modal">
        <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto bg radius-md inner-glow shadow-md"
            role="alertdialog" aria-labelledby="modal-title-2" aria-describedby="modal-description-2">
            <header
                class="bg-contrast-lower bg-opacity-50% padding-y-sm padding-x-md flex items-center justify-between">
                <h1 id="modal-title-2" class="text-truncate text-md">Add Company</h1>
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

            <div class="padding-y-sm padding-x-md margin-sm">
                @if (session()->has('success'))
                    <div class="alert alert--is-visible padding-sm radius-md js-alert" role="alert">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="icon icon--sm alert__icon margin-right-xxs" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path
                                        d="M12,0C5.383,0,0,5.383,0,12s5.383,12,12,12s12-5.383,12-12S18.617,0,12,0z M14.658,18.284 c-0.661,0.26-2.952,1.354-4.272,0.191c-0.394-0.346-0.59-0.785-0.59-1.318c0-0.998,0.328-1.868,0.919-3.957 c0.104-0.395,0.231-0.907,0.231-1.313c0-0.701-0.266-0.887-0.987-0.887c-0.352,0-0.742,0.125-1.095,0.257l0.195-0.799 c0.787-0.32,1.775-0.71,2.621-0.71c1.269,0,2.203,0.633,2.203,1.837c0,0.347-0.06,0.955-0.186,1.375l-0.73,2.582 c-0.151,0.522-0.424,1.673-0.001,2.014c0.416,0.337,1.401,0.158,1.887-0.071L14.658,18.284z M13.452,8c-0.828,0-1.5-0.672-1.5-1.5 s0.672-1.5,1.5-1.5s1.5,0.672,1.5,1.5S14.28,8,13.452,8z">
                                    </path>
                                </svg>
                                <p class="text-sm"><strong>Info:</strong> {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="text-component">
                    <p id="modal-description-2">
                    <div class="grid grid-gap-md">
                        <div class="col-6@md">
                            <label class="form-label margin-bottom-xxs" for="name">
                                <x-required-label></x-required-label> Name
                            </label>
                            <input wire:model="name" class="form-control width-100% @error('name') is-error @enderror"
                                type="text">
                            @error('name')
                                <span class="text-xs color-accent">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6@md">
                            <label class="form-label margin-bottom-xxs" for="email">
                                <x-required-label></x-required-label> Email
                            </label>
                            <input wire:model="email" class="form-control width-100% @error('email') is-error @enderror"
                                type="email">
                            @error('email')
                                <span class="text-xs color-accent">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6@md">
                            <label class="form-label margin-bottom-xxs" for="contact">
                                <x-required-label></x-required-label> Contact
                            </label>
                            <input wire:model="contact"
                                class="form-control width-100% @error('contact') is-error @enderror" type="text">
                            @error('contact')
                                <span class="text-xs color-accent">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6@md">
                            <label class="form-label margin-bottom-xxs" for="country">
                                <x-required-label></x-required-label> Country
                            </label>
                            <input wire:model="country"
                                class="form-control width-100% @error('country') is-error @enderror" type="text">
                            @error('country')
                                <span class="text-xs color-accent">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    </p>
                </div>
            </div>

            <footer class="padding-lg">
                <div class="flex justify-end gap-md">
                    <button class="btn btn--subtle js-modal__close">Close</button>
                    <button class="btn btn--primary" wire:click="saveCompany()">Save</button>
                </div>
            </footer>
        
        </div>
    </div>
</div>
