@section('title', 'Edit department')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Edit - {{ $department->name }}</h2>
    </div>

    <div class="bg radius-md shadow-xs">
        <form action="{{ route('department.update', $department->id) }}" method="post">
            @csrf
            @method('put')
            <div class="grid gap-lg max-width-sm padding-lg">
                <a href="{{ route('departmentDatatable') }}">&larr; Go to departments</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="name">Department name</label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ $department->name }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <div class="select">
                        <label class="form-label margin-bottom-xxs" for="location">Location</label>
                        <select class="form-control select__input" name="location_id" required>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}"
                                    {{ old('location_id', $department->location_id) == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
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
                        name="manager" id="manager" value="{{ $department->manager }}" required>
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
                            <option value="{{ $department->designation }}">{{ ucfirst($department->designation) }}
                            </option>
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
                        name="email" id="email" value="{{ $department->email }}" required>
                    @error('email')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="contact">Contact
                    </label>
                    <input class="form-control width-100% @error('contact') is-error @enderror" type="text"
                        name="contact" id="contact" value="{{ $department->contact }}">
                    @error('contact')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md font-medium">Update department</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
