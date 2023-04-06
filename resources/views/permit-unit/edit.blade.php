@section('title', 'Create certificate')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Edit - {{ $permitUnit->name }}</h1>
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
                        <x-required-label></x-required-label>Permit unit name
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
