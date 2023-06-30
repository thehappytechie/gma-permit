@section('title', 'Edit brand')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Branding</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs margin-bottom-xl">
        <form action="{{ route('brand-setting.update', $brandSetting->id) }}" method="post">
            @csrf
            @method('put')
            <div class="grid gap-lg max-width-sm">
                <a href="{{ route('settings') }}">&larr; Go to settings</a>
                <div class="col-8@md">
                    <label class="form-label margin-bottom-xxs" for="site_name">
                        <x-required-label></x-required-label>Site name
                    </label>
                    <input class="form-control width-100% @error('site_name') is-error @enderror" type="text"
                        name="site_name" id="site_name" value="{{ $brandSetting->site_name }}" required>
                    @error('site_name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
