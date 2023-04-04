@section('title', 'Edit profile')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Account Management</h1>
    </div>
    <div class="margin-bottom-md">
        <nav class="s-tabs">
            <ul class="s-tabs__list">
                <li><a class="s-tabs__link s-tabs__link--current"
                        href="{{ route('profile.edit', Auth::user()->id) }}">Profile</a></li>
                <li><a class="s-tabs__link" href="{{ route('changePassword') }}">Password</a></li>
                <li><a class="s-tabs__link" href="{{ route('security') }}">Account Security</a></li>
            </ul>
        </nav>
    </div>

    <div class="bg radius-md shadow-xs">
        <div class="max-width-sm">
            <form action="{{ route('profile.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="padding-lg">
                    <fieldset class="margin-bottom-xl">
                        <legend class="margin-bottom-md font-medium text-md">Profile Information</legend>
                        <div class="margin-bottom-sm">
                            <div class="grid gap-xxs">
                                <div class="col-6@lg">
                                    <label class="inline-block text-sm padding-top-xs@lg" for="name">
                                        <x-required-label></x-required-label>Name
                                    </label>
                                </div>
                                <div class="col-6@lg">
                                    <input class="form-control width-100%" type="text" name="name" id="name"
                                        value="{{ $user->name }}" required="">
                                </div>
                            </div>
                        </div>
                        <div class="margin-bottom-xl">
                            <div class="grid gap-xxs">
                                <div class="col-6@lg">
                                    <label class="inline-block text-sm padding-top-xs@lg" for="email">
                                        <x-required-label></x-required-label>Email
                                    </label>
                                </div>
                                <div class="col-6@lg">
                                    <input class="form-control width-100% @error('email') is-error @enderror"
                                        type="email" name="email" id="email" value="{{ $user->email }}" disabled>
                                    @error('email')
                                        <x-validation-error>{{ $message }}</x-validation-error>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @canany(['is-admin', 'is-editor'])
                            <legend class="margin-bottom-md font-medium text-md">Staff Information</legend>
                            <div class="margin-bottom-sm">
                                <div class="grid gap-xxs">
                                    <div class="col-6@lg">
                                        <label class="inline-block text-sm padding-top-xs@lg"
                                            for="input-contact">Contact</label>
                                    </div>
                                    <div class="col-6@lg">
                                        <input class="form-control width-100% @error('contact') is-error @enderror"
                                            type="number" name="contact" id="contact" value="{{ $user->contact }}">
                                        @error('contact')
                                            <x-validation-error>{{ $message }}</x-validation-error>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="margin-bottom-sm">
                                <div class="grid gap-xxs">
                                    <div class="col-6@lg">
                                        <label class="inline-block text-sm padding-top-xs@lg" for="employee_no">Employee
                                            number</label>
                                    </div>
                                    <div class="col-6@lg">
                                        <input class="form-control width-100%" type="text" name="employee_no"
                                            id="employee_no" value="{{ $user->employee_no }}">
                                    </div>
                                </div>
                            </div>
                            <div class="margin-bottom-sm">
                                <div class="grid gap-xxs">
                                    <div class="col-6@lg">
                                        <label class="inline-block text-sm padding-top-xs@lg"
                                            for="input-department">Department</label>
                                    </div>
                                    <div class="col-6@lg">
                                        <div class="select">
                                            <select class="form-control select__input" name="department_id">
                                                <option value=""></option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}"
                                                        {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true"
                                            viewBox="0 0 12 12">
                                            <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="margin-bottom-sm">
                                <div class="grid gap-xxs">
                                    <div class="col-6@lg">
                                        <label class="inline-block text-sm padding-top-xs@lg"
                                            for="input-location">Location</label>
                                    </div>
                                    <div class="col-6@lg">
                                        <div class="select">
                                            <select class="form-control select__input" name="location_id">
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}"
                                                        {{ old('location_id', $user->location_id) == $location->id ? 'selected' : '' }}>
                                                        {{ $location->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true"
                                            viewBox="0 0 12 12">
                                            <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endcanany
                    </fieldset>
                    <div class="border-top border-contrast-lower text-right">
                        <div class="margin-top-sm">
                            <button class="btn btn--primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-layout>
