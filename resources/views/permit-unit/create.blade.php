@section('title', 'Create permit unit')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Create Permit Unit</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs margin-bottom-xl">
        <form action="{{ route('permit-unit.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm">
                <a href="{{ route('permitUnitDatatable') }}">&larr; Go to permit units</a>
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
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md font-medium">Create permit unit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
