@section('title', 'Edit user')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Edit - {{ $user->name }}</h1>
    </div>

    <div class="bg radius-md shadow-xs">
        {{-- Toggle delete confirmation modal --}}
        <div id="modal-name-2"
            class="modal modal--animate-translate-up flex flex-center bg-black bg-opacity-90% padding-md js-modal">
            <div class="modal__content width-100% max-width-xs max-height-100% overflow-auto bg radius-md inner-glow shadow-md"
                role="alertdialog" aria-labelledby="modal-title-2" aria-describedby="modal-description-2">
                <header
                    class="bg-contrast-lower bg-opacity-50% padding-y-sm padding-x-md flex items-center justify-between">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#e22054"
                        viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <h1 id="modal-title-2" class="text-truncate text-md"> Are you sure you want to permanently delete?
                    </h1>

                    <button class="reset modal__close-btn modal__close-btn--inner js-modal__close js-tab-focus">
                        <svg class="icon icon--xs" viewBox="0 0 16 16">
                            <title>Close modal window</title>
                            <g stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-miterlimit="10">
                                <line x1="13.5" y1="2.5" x2="2.5" y2="13.5"></line>
                                <line x1="2.5" y1="2.5" x2="13.5" y2="13.5"></line>
                            </g>
                        </svg>
                    </button>
                </header>

                <div class="padding-y-sm padding-x-md">
                    <div class="text-component">
                        <p id="modal-description-2"> This action <strong>cannot</strong> be undone.
                            <strong>{{ $user->name }}</strong> and all related
                            associations will also be deleted.
                        </p>
                    </div>
                </div>
                <footer class="padding-md">
                    <div class="flex justify-end gap-xs">
                        <button class="btn btn--subtle js-modal__close">Cancel</button>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn--accent">Delete</button>
                        </form>
                    </div>
                </footer>
            </div>
        </div>

        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')
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
                        name="name" id="name" value="{{ $user->name }}" required>
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
                        name="email" id="email" value="{{ $user->email }}" required>
                    @error('email')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="password">Password</label>
                    <input class="form-control width-100%  @error('password') is-error @enderror" type="password"
                        name="password" id="password">
                    @error('password')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="password_confirmation">Confirm
                        password</label>
                    <input class="form-control width-100%" type="password" name="password_confirmation"
                        id="password_confirmation">
                </div>
                <div class="max-width-lg text-divider col-11 color-primary-darker"><span> ROLE & PERMISSIONS</span>
                </div>
                <div class="col-4@md">
                    <label class="form-label margin-bottom-xxs" for="role">
                        <x-required-label></x-required-label>User role
                    </label>
                    <div class="select">
                        <select class="form-control select__input" name="role" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ $user->hasAnyRole($role->name) ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </div>
                <div class="col-8@md">
                    <label class="form-label margin-bottom-xxs" for="permissions">Permissions </label>
                    <div class="select">
                        <select multiple class="js-choice form-control select__input" name="permissions[]">
                            @foreach ($user->permissions as $permission)
                                <option value="{{ $permission->id }}" {{ $permission->id ? 'selected' : '' }}>
                                    {{ $permission->name }}</option>
                            @endforeach
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">
                                    {{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="max-width-lg text-divider col-11 color-primary-darker"><span> ACCOUNT MANAGEMENT</span>
                </div>
                <fieldset class="margin-top-xs">
                    <ul class="flex flex-wrap gap-md">
                        <li>
                            <input class="checkbox" name="force_password_change" type="hidden" value="0">
                            <input class="checkbox" name="force_password_change" type="checkbox" id="checkbox-2"
                                value="1" @checked(old(1, $user->force_password_change))>
                            <label for="checkbox-2"><span class="text-sm">FORCE PASSWORD CHANGE</span></label>
                        </li>
                        <li>
                            <input class="checkbox" type="hidden" name="disable_login" value="0">
                            <input class="checkbox" type="checkbox" id="checkbox-1" name="disable_login"
                                value="1" @checked(old(1, $user->disable_login))>
                            <label for="checkbox-1"><span class="text-sm color-accent-light">DISABLE USER
                                    LOGIN</span></label>
                        </li>
                    </ul>
                </fieldset>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--subtle margin-right-lg" aria-controls="modal-name-2"><span
                                class="color-accent font-medium">Delete</span></button>
                        <button class="btn btn--primary">Update</button>
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
            placeholderValue: 'Click to edit permissions',
        });
    </script>

</x-layout>
