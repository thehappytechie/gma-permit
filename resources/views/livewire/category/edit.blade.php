@section('title', 'Edit Category')

<div>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Edit Category</h1>
    </div>

    <div class="bg radius-md shadow-xs">
        <div class="grid gap-lg max-width-sm padding-lg">
            <a href="{{ route('categoryDatatable') }}">&larr; Go to categories</a>
            <small class="color-contrast-medium">
                <x-required-label></x-required-label>indicates a required field
            </small>
            <div class="col-8@md">
                <label class="form-label margin-bottom-xxs" for="name">
                    <x-required-label></x-required-label> Name
                </label>
                <input wire:model="name" class="form-control width-100% @error('name') is-error @enderror"
                    type="text">
                @error('name')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="col-8@md"></div>
            <div class="col-8@md">
                <label class="form-label margin-bottom-xxs" for="description">Description</label>
                <textarea wire:model="description" class="form-control width-100% @error('description') is-error @enderror" id="description"
                    name="description" rows="4" cols="50" value="{{ old('description') }}" required></textarea>
                @error('description')
                    <x-validation-error>{{ $message }}</x-validation-error>
                @enderror
            </div>
            <div class="border-top border-contrast-lower text-right">
                <div class="margin-top-sm">
                    <button wire:click.prevent="save" class="btn btn--primary">Save</button>
                </div>
            </div>
        </div>
    </div>

</div>
