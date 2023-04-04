@section('title', 'Send report')

<div>
    <x-alert />

    @if (session('success'))
        <script>
            let notyf = new Notyf({
                dismissible: true,
                duration: 0,
                ripple: true,
                position: {
                    x: 'right',
                    y: 'top'
                },
            })
            notyf.success('{{ session('success') }}')
        </script>
    @endif

    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Upload Report</h1>
    </div>

    <div class="bg radius-md shadow-xs">
        <div class="grid gap-lg max-width-md padding-lg">
            @if (count($errors) > 0)
                <div class="alert alert--error alert--is-visible padding-sm radius-md" role="alert">
                    <div class="flex items-center">
                        <svg class="icon icon--md margin-right-sm" viewBox="0 0 30 30">
                            <path
                                d="M28.707 8.908l-7.615-7.615A1 1 0 0 0 20.385 1H9.615a1 1 0 0 0-.707.293L1.293 8.908A1 1 0 0 0 1 9.615v10.77a1 1 0 0 0 .293.707l7.615 7.615a1 1 0 0 0 .707.293h10.77a1 1 0 0 0 .707-.293l7.615-7.615a1 1 0 0 0 .293-.707V9.615a1 1 0 0 0-.293-.707z"
                                fill="var(--color-error)" opacity=".2"></path>
                            <path fill="none" stroke="var(--color-error)" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M15 17V8"></path>
                            <circle cx="15" cy="21.5" r="1.5" fill="var(--color-error)"></circle>
                        </svg>
                        <p class="note__title color-contrast-high"><strong>Sorry! errors found with the form </strong>
                        </p>
                    </div>
                    <div class="flex margin-top-xxxs">
                        <svg class="icon icon--md margin-right-sm" aria-hidden="true"></svg>
                        <div class="note__content text-component">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <a href="{{ route('reportUploads') }}">&larr; Go to reports</a>
            <small class="color-contrast-medium">
                <x-required-label></x-required-label>indicates a required field
            </small>
            <div class="col-6@md">
                <div class="select">
                    <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                        <x-required-label></x-required-label>Agent name
                    </label>
                    <select name="agent_id" wire:model="agent_id"
                        class="js-choice form-control select__input @error('agent_id') is-error @enderror">
                        <option value="0">Please select</option>
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
                                {{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>
                <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                    <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" />
                </svg>
            </div>
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="full name">
                    <x-required-label></x-required-label>Full name
                </label>
                <input wire:model="full_name" class="form-control width-100%  @error('full_name') is-error @enderror"
                    type="text" name="full_name" id="full_name">
            </div>
            <div class="col-6@md">
                <div class="select">
                    <label class="form-label margin-bottom-xxs" for="report period">
                        <x-required-label></x-required-label>Report period
                    </label>
                    <select name="agent_id" wire:model="report_period"
                        class="form-control select__input width-100% @error('report_period') is-error @enderror"
                        required>
                        <option value="0">Please select</option>
                        <option value="1st quarter">1st quarter</option>
                        <option value="2nd quarter">2nd quarter</option>
                        <option value="3rd quarter">3rd quarter</option>
                        <option value="4th quarter">4th quarter</option>
                    </select>
                </div>
                <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                    <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" />
                </svg>
            </div>
            <div class="col-6@md">
                <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">
                    <x-required-label></x-required-label>File upload (PDF, DOC, DOCX)
                </label>
                <input wire:model="file_name" class="form-control width-100% @error('file_name') is-error @enderror"
                    type="file" wire:model="file_name" id="file_name">
            </div>
            <div class="border-top border-contrast-lower text-right">
                <div class="margin-top-sm">
                    <button type="button" wire:click.prevent="save" class="btn btn--primary">Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>
