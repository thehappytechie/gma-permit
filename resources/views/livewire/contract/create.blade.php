<div>
    @section('title', 'Add contract')


    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Add Contract</h1>
    </div>
    <div class="bg radius-md shadow-xs">
        <div class="grid gap-lg max-width-sm padding-lg">
            <a href="{{ route('contractDatatable') }}">&larr; Go to contracts</a>
            <small class="color-contrast-medium">
                <x-required-label></x-required-label>indicates a required field
            </small>
            <p class="font-medium border-bottom border-contrast-low"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                    height="14" fill="currentColor" class="bi bi-1-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM9.283 4.002H7.971L6.072 5.385v1.271l1.834-1.318h.065V12h1.312V4.002Z" />
                </svg>
                CONTRACT DETAILS</p>
            <div class="col-12@md">
                <label class="form-label margin-bottom-xxs" for="title">
                    <x-required-label></x-required-label>Contract title
                </label>
                <input wire:model="title" class="form-control width-100% @error('title') is-error @enderror"
                    type="text">
                @error('title')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-4@md">
                <label class="form-label margin-bottom-xxs" for="status">
                    <x-required-label></x-required-label> Contract status
                </label>
                <div class="select">
                    <select class="form-control width-100% @error('status') is-error @enderror select__input"
                        wire:model="status">
                        <option value="">Select status</option>
                        <option value="active">Active</option>
                        <option value="archived">Archived</option>
                        <option value="draft">Draft</option>
                        <option value="expired">Expired</option>
                        <option value="in-negotiating">In Negotiating</option>
                        <option value="pending">Pending</option>
                        <option value="superseded">Superseded</option>
                        <option value="terminated">Terminated</option>
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

            {{-- Start add Category --}}
            <div class="col-4@md">
                <label class="form-label margin-bottom-xxs" for="category">
                    <x-required-label></x-required-label>Category
                </label>
                <div class="select">
                    <select wire:model="category_id"
                        class="form-control width-100% @error('category_id') is-error @enderror">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                    <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" />
                </svg>
                @error('category_id')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror

                <div x-data="{ open: false }" @body-scroll="document.body.style.overflowY = open ? 'hidden' : ''">
                    <div class="">
                        <button @click="open = !open; $dispatch('body-scroll', {})" class="btn btn--sm margin-top-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                fill="hsl(210deg 100% 52%)" class="" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                            </svg> <small class="margin-left-xxxs">Add new</small></button>
                    </div>
                    <div x-show="open" x-cloak style="position: fixed;z-index:3;top:0;left:0;right:0;bottom:0;"
                        class="flex flex-center bg-black bg-opacity-80% padding-md js-modal modal--is-visible"
                        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100">
                        <div @click.away="open = false; $dispatch('body-scroll', {})"
                            class="width-100% max-width-xs max-height-100% overflow-auto bg radius-md inner-glow shadow-md">
                            <header
                                class="bg-contrast-lower bg-opacity-50% padding-y-sm padding-x-md flex items-center justify-between">
                                <h1 class="text-truncate text-md">Add Category</h1>
                                <button class="reset modal__close-btn modal__close-btn--inner" style="outline: none;"
                                    @click="open = false; $dispatch('body-scroll', {})">
                                    <svg class="icon icon--xs" viewBox="0 0 16 16">
                                        <title>Close modal window</title>
                                        <g stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10">
                                            <line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line>
                                            <line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line>
                                        </g>
                                    </svg>
                                </button>
                            </header>
                            <div class="padding-y-sm padding-x-md margin-sm">
                                @if (session()->has('success'))
                                    <div class="padding-sm radius-md">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center" x-data="{ show: true }"
                                                x-effect="setTimeout(() => show = false, 3000)" x-show="show">
                                                <svg class="icon icon--sm alert__icon margin-right-xxs"
                                                    viewBox="0 0 24 24" aria-hidden="true">
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
                                <div class="grid grid-gap-md">
                                    <div class="col-8@md">
                                        <label class="form-label margin-bottom-xxs" for="name">
                                            <x-required-label></x-required-label> Name
                                        </label>
                                        <input wire:model="name"
                                            class="form-control width-100% @error('name') is-error @enderror"
                                            type="text">
                                        @error('name')
                                            <x-validation-error>{{ $message }}</x-validation-error>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <footer class="padding-md">
                                <div class="flex justify-end gap-md">
                                    <button class="btn btn--subtle"
                                        @click="open = false; $dispatch('body-scroll', {})">Close</button>
                                    <button class="btn btn--primary" wire:click="saveCategory()">Save</button>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End add category --}}

            <div class="col-4@md">
                <label class="form-label margin-bottom-xxs" for="contract_code">
                    Contract unique code
                </label>
                <input wire:model="contract_code"
                    class="form-control width-100% @error('contract_code') is-error @enderror" type="text"
                    id="contract_code" value="{{ old('contract_code') }}">`
                @error('contract_code')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>

            {{-- Start add company --}}
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="company">
                    <x-required-label></x-required-label>Company
                </label>
                <div class="select">
                    <select wire:model="company_id"
                        class="form-control width-100% @error('company_id') is-error @enderror">
                        <option value="">Select company</option>
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

                <div x-data="{ open: false }" @body-scroll="document.body.style.overflowY = open ? 'hidden' : ''">
                    <div class="">
                        <button @click="open = !open; $dispatch('body-scroll', {})" class="btn btn--sm margin-top-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                fill="hsl(210deg 100% 52%)" class="" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                            </svg> <small class="margin-left-xxxs">Add new</small></button>
                    </div>
                    <div x-show="open" x-cloak style="position: fixed;z-index:3;top:0;left:0;right:0;bottom:0;"
                        class="flex flex-center bg-black bg-opacity-80% padding-md js-modal modal--is-visible"
                        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                        x-transition:enter-end="opacity-100 scale-100">
                        <div @click.away="open = false; $dispatch('body-scroll', {})"
                            class="width-100% max-width-xs max-height-100% overflow-auto bg radius-md inner-glow shadow-md">
                            <header
                                class="bg-contrast-lower bg-opacity-50% padding-y-sm padding-x-md flex items-center justify-between">
                                <h1 class="text-truncate text-md">Add Company</h1>
                                <button class="reset modal__close-btn modal__close-btn--inner" style="outline: none;"
                                    @click="open = false; $dispatch('body-scroll', {})">
                                    <svg class="icon icon--xs" viewBox="0 0 16 16">
                                        <title>Close modal window</title>
                                        <g stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10">
                                            <line x1="13.5" y1="2.5" x2="2.5" y2="13.5">
                                            </line>
                                            <line x1="2.5" y1="2.5" x2="13.5" y2="13.5">
                                            </line>
                                        </g>
                                    </svg>
                                </button>
                            </header>
                            <div class="padding-y-sm padding-x-md margin-sm">
                                @if (session()->has('success'))
                                    <div class="padding-sm radius-md">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center" x-data="{ show: true }"
                                                x-effect="setTimeout(() => show = false, 3000)" x-show="show">
                                                <svg class="icon icon--sm alert__icon margin-right-xxs"
                                                    viewBox="0 0 24 24" aria-hidden="true">
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

                                <div class="grid grid-gap-md">
                                    <div class="col-6@md">
                                        <label class="form-label margin-bottom-xxs" for="name">
                                            <x-required-label></x-required-label> Name
                                        </label>
                                        <input wire:model="name"
                                            class="form-control width-100% @error('name') is-error @enderror"
                                            type="text">
                                        @error('name')
                                            <x-validation-error>{{ $message }}</x-validation-error>
                                        @enderror
                                    </div>
                                    <div class="col-6@md">
                                        <label class="form-label margin-bottom-xxs" for="contact">
                                            Contact
                                        </label>
                                        <input wire:model="contact"
                                            class="form-control width-100% @error('contact') is-error @enderror"
                                            type="text">
                                        @error('contact')
                                            <x-validation-error>{{ $message }}</x-validation-error>
                                        @enderror
                                    </div>
                                    <div class="col-6@md">
                                        <label class="form-label margin-bottom-xxs" for="address">
                                            <x-required-label></x-required-label> Address
                                        </label>
                                        <input wire:model="address"
                                            class="form-control width-100% @error('address') is-error @enderror"
                                            type="text">
                                        @error('address')
                                            <x-validation-error>{{ $message }}</x-validation-error>
                                        @enderror
                                    </div>
                                    <div class="col-6@md">
                                        <label class="form-label margin-bottom-xxs" for="country">
                                            <x-required-label></x-required-label> Country
                                        </label>
                                        <div class="select">
                                            <select
                                                class="form-control width-100% @error('country') is-error @enderror select__input"
                                                wire:model="country">
                                                <option value="">Select country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true"
                                            viewBox="0 0 12 12">
                                            <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </svg>
                                        @error('country')
                                            <x-validation-error>{{ $message }}</x-validation-error>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <footer class="padding-md">
                                <div class="flex justify-end gap-md">
                                    <button class="btn btn--subtle"
                                        @click="open = false; $dispatch('body-scroll', {})">Close</button>
                                    <button class="btn btn--primary" wire:click="saveCompany()">Save</button>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End add company --}}

            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="contract_scope">
                    Contract scope
                </label>
                <textarea rows="3" wire:model="contract_scope"
                    class="form-control width-100% @error('contract_scope') is-error @enderror" maxlength="150" id="contract_scope"
                    spellcheck="true" value="{{ old('contract_scope') }}"></textarea>
                @error('contract_scope')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>

            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="department">
                    <x-required-label></x-required-label>Department
                </label>
                <div class="select">
                    <select wire:model="department_id" name="department_id"
                        class="form-control width-100% @error('department_id') is-error @enderror">
                        <option value="">Select department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ ucfirst($department->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                    <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" />
                </svg>
                @error('department_id')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="contact_person">
                    Contact person
                </label>
                <input wire:model="contact_person"
                    class="form-control width-100% @error('contact_person') is-error @enderror" type="text"
                    id="contact_person" value="{{ old('contact_person') }}">`
                @error('contact_person')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <p class="font-medium border-bottom border-contrast-low">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                    class="bi bi-2-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM6.646 6.24c0-.691.493-1.306 1.336-1.306.756 0 1.313.492 1.313 1.236 0 .697-.469 1.23-.902 1.705l-2.971 3.293V12h5.344v-1.107H7.268v-.077l1.974-2.22.096-.107c.688-.763 1.287-1.428 1.287-2.43 0-1.266-1.031-2.215-2.613-2.215-1.758 0-2.637 1.19-2.637 2.402v.065h1.271v-.07Z" />
                </svg>
                LIFE CYCLE
            </p>
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="start_date">
                    <x-required-label></x-required-label>Start date
                </label>
                <input wire:model="start_date"
                    class="form-control width-100% @error('start_date') is-error @enderror" type="date"
                    id="start_date" value="{{ old('start_date') }}">
                @error('start_date')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="expiry_date">
                    <x-required-label></x-required-label> Expiry date
                </label>
                <input wire:model="expiry_date"
                    class="form-control width-100% @error('expiry_date') is-error @enderror" type="date"
                    id="expiry_date" value="{{ old('expiry_date') }}">
                @error('expiry_date')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-12@md">
                <label class="form-label margin-bottom-xxs" for="narration">
                    Comments
                </label>
                <textarea rows="3" wire:model="narration"
                    class="form-control width-100% @error('narration') is-error @enderror" maxlength="150" id="narration"
                    spellcheck="true" value="{{ old('narration') }}"></textarea>
                @error('narration')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <p class="font-medium border-bottom border-contrast-low">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                    class="bi bi-3-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-8.082.414c.92 0 1.535.54 1.541 1.318.012.791-.615 1.36-1.588 1.354-.861-.006-1.482-.469-1.54-1.066H5.104c.047 1.177 1.05 2.144 2.754 2.144 1.653 0 2.954-.937 2.93-2.396-.023-1.278-1.031-1.846-1.734-1.916v-.07c.597-.1 1.505-.739 1.482-1.876-.03-1.177-1.043-2.074-2.637-2.062-1.675.006-2.59.984-2.625 2.12h1.248c.036-.556.557-1.054 1.348-1.054.785 0 1.348.486 1.348 1.195.006.715-.563 1.237-1.342 1.237h-.838v1.072h.879Z" />
                </svg>
                ATTACHMENTS
            </p>
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                    File upload (supported files: PDF)
                </label>
                <div wire:ignore x-data x-init="FilePond.registerPlugin(FilePondPluginFileValidateType);
                FilePond.setOptions({
                    server: {
                        process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                            @this.upload('file_name', file, load, error, progress)
                        },
                        revert: (filename, load) => {
                            @this.removeUpload('file_name', filename, load)
                        }
                    },
                    allowMultiple: true,
                    allowFileTypeValidation: true,
                });
                
                FilePond.create($refs.input);">
                    <input wire:model="file_name"
                        class="form-control width-100% @error('file_name') is-error @enderror" type="file"
                        x-ref="input" id="file_name">
                </div>
                @error('file_name')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="border-top border-contrast-lower text-right">
                <div class="margin-top-sm">
                    <button wire:click.prevent="submitForm" class="btn btn--primary">Save contract</button>
                </div>
            </div>
        </div>
    </div>

</div>
