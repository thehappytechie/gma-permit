@section('title', 'Create user')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Add User</h1>
    </div>

    <div class="bg radius-md shadow-xs">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm padding-lg">
                <a href="{{ route('userDatatable') }}">&larr; Go to users</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label>
                        </x-required-label>Full name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="email">
                        <x-required-label>
                        </x-required-label>Email
                    </label>
                    <input class="form-control width-100%  @error('email') is-error @enderror" type="email"
                        name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="password">
                        <x-required-label>
                        </x-required-label>Password
                    </label>
                    <input class="form-control width-100%  @error('password') is-error @enderror" type="password"
                        name="password" id="password" required>
                    @error('password')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="password_confirmation">
                        <x-required-label></x-required-label>Confirm
                        password
                    </label>
                    <input class="form-control width-100%" type="password" name="password_confirmation"
                        id="password_confirmation" required>
                </div>
                <div class="max-width-lg text-divider col-11 color-primary-darker"><span> ROLE & PERMISSIONS</span>
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="role">
                        <x-required-label>
                        </x-required-label>User role
                    </label>
                    <div class="select">
                        <select class="form-control select__input" name="roles" required>
                            <option value="">Select role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </div>
                <div class="col-8@md">
                    <label class="form-label margin-bottom-xxs" for="permissions">Permissions
                    </label>
                    <div class="select">
                        <select multiple class="js-choice form-control select__input" name="permissions[]">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">
                                    {{ $permission->name }}
                            @endforeach
                            </option>
                        </select>
                    </div>
                </div>
                <div class="max-width-md text-divider col-11 color-primary-darker"><span> ACCOUNT MANAGEMENT</span>
                </div>
                <fieldset class="margin-top-xs">
                    <ul class="flex flex-wrap gap-md">
                        <li>
                            <input class="checkbox" type="hidden" name="force_password_change" value="0">
                            <input class="checkbox" type="checkbox" id="checkbox-1" name="force_password_change"
                                value="1">
                            <label for="checkbox-1"><span class="text-sm">FORCE PASSWORD CHANGE</span></label>
                        </li>
                        <li>
                            <input class="checkbox" name="disable_login" type="hidden" value="0">
                            <input class="checkbox" name="disable_login" type="checkbox" id="checkbox-2" value="1">
                            <label for="checkbox-2"><span class="text-sm color-accent-light">DISABLE USER
                                    LOGIN</span></label>
                        </li>
                    </ul>
                </fieldset>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary">Create user</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/choices.min.js') }}"></script>

    <script>
        const choices = new Choices('.js-choice', {
            removeItemButton: true,
            removeItems: true,
            searchEnabled: true,
            duplicateItemsAllowed: false,
            placeholderValue: 'Click to add permissions',
        });
    </script>

</x-layout>
