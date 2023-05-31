@section('title', 'Create role')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Add Role</h2>
    </div>

    <div class="bg radius-md shadow-xs">
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm padding-lg">
                <a href="{{ route('roleDatatable') }}">&larr; Back to roles</a>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label></x-required-label> Role name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary">Create role</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
