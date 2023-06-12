@section('title', 'Create department')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Create Department</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs margin-bottom-xl">
        <form action="{{ route('department.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm">
                <a href="{{ route('departmentDatatable') }}">&larr; Go to departments</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label></x-required-label> Department name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <div class="select">
                        <label class="form-label margin-bottom-xxs" for="location">
                            <x-required-label></x-required-label> Location
                        </label>
                        <select class="form-control select__input" name="location_id" id="location" required>
                            <option value="">Select location</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ ucfirst($location->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="manager">
                        <x-required-label></x-required-label> Manager
                    </label>
                    <input class="form-control width-100% @error('manager') is-error @enderror" type="text"
                        name="manager" id="manager" value="{{ old('manager') }}" required>
                    @error('manager')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <div class="select">
                        <label class="form-label margin-bottom-xxs" for="designation">
                            <x-required-label></x-required-label> Designation
                        </label>
                        <select class="form-control select__input" name="designation" id="designation" required>
                            <option value="">Select designation</option>
                            <option value="director">Director</option>
                            <option value="deputy director">Deputy Director</option>
                            <option value="principal officer">Principal Officer</option>
                            <option value="senior officer">Senior Officer</option>
                            <option value="Officer">Officer</option>
                            <option value="assistant officer">Assistant Officer</option>
                        </select>
                    </div>
                    <svg class="float-right icon icon--xxs dropdown--icon" aria-hidden="true" viewBox="0 0 12 12">
                        <polyline points="1 4 6 9 11 4" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="email">
                        <x-required-label></x-required-label> Email
                    </label>
                    <input class="form-control width-100% @error('email') is-error @enderror" type="email"
                        name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="contact">Contact
                    </label>
                    <input class="form-control width-100% @error('contact') is-error @enderror" type="text"
                        name="contact" id="contact" value="{{ old('contact') }}">
                    @error('contact')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md font-medium">Create department</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
