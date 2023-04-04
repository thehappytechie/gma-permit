@section('title', 'Import Agencies')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-semibold">Import Agency</h1>
    </div>
    <div class="bg radius-md shadow-xs">
        <form action="{{ route('agent.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-md padding-lg">
                <a href="">&larr; Go to agents</a>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="autocomplete-input-id">Please select Excel file</label>
                    <input wire:model="file_name" class="form-control width-100% @error('file_name') is-error @enderror"
                        type="file" id="file_name">
                    @error('name')
                    <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
            </div>
            <x-submit-button>Upload excel data</x-submit-button>
        </form>
    </div>

</x-layout>
