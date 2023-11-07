@section('title', 'Edit permit unit')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Edit - {{ ucwords(strtolower($permitUnit->name)) }}</h2>
    </div>

    <div class="bg radius-md shadow-xs">
        <form action="{{ route('permit-unit.update',$permitUnit->id) }}" method="post">
            @csrf
            @method('put')
            <div class="grid gap-lg max-width-sm padding-lg">
                <a href="{{ route('permitUnitDatatable') }}">&larr; Go to permit units</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        Permit unit name <x-required-label></x-required-label>
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ $permitUnit->name }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md">Update permit unit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
