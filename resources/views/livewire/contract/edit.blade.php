@section('title', 'Edit Contract')

<div>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">{{ $contract->company->name }}</h1>
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
            <div class="col-8@md">
                <label class="form-label margin-bottom-xxs" for="title">
                    <x-required-label></x-required-label>Contract Title
                </label>
                <input wire:model="title" class="form-control width-100% @error('title') is-error @enderror"
                    type="text">
                @error('title')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-4@md">
                <label class="form-label margin-bottom-xxs" for="status">
                    <x-required-label></x-required-label> Contract Status
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
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="category">
                    <x-required-label></x-required-label>Contract Category
                </label>
                <div class="select">
                    <select wire:model="category_id"
                        class="form-control select__input width-100% @error('category_id') is-error @enderror">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}
                            </option>
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
            </div>
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="company">
                    <x-required-label></x-required-label>Company
                </label>
                <div class="select">
                    <select wire:model="company_id" name="company_id"
                        class="form-control width-100% @error('company_id') is-error @enderror">
                        <option value="">Select company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ ucfirst($company->name) }}
                            </option>
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
                            <option value="{{ $department->id }}">
                                {{ ucfirst($department->name) }}
                            </option>
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
                    Contact Person
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
                <input wire:model="start_date" class="form-control width-100% @error('start_date') is-error @enderror"
                    type="date" id="start_date" value="{{ old('start_date') }}">
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
                <label class="form-label margin-bottom-xxs" for="comment">
                    Comments
                </label>
                <textarea rows="3" wire:model="comment" class="form-control width-100% @error('comment') is-error @enderror"
                    maxlength="150" id="comment" spellcheck="true" value="{{ old('comment') }}"></textarea>
                @error('comment')
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
                    File upload (supported files; PDF, DOC, DOCX)
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
                    <button wire:click.prevent="save" class="btn btn--primary">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
