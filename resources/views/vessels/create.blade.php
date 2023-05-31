@section('title', 'Create vessel')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Create vessel</h2>
    </div>

    <div class="bg radius-md shadow-xs">
        <form action="{{ route('vessels.store') }}" method="post">
            @csrf
            <div class="grid gap-lg max-width-sm padding-lg">
                <a href="{{ route('vesselDatatable') }}">&larr; Go to vessels</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label></x-required-label> Vessel name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ old('name') }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="flag">
                        Flag
                    </label>
                    <input class="form-control width-100% @error('flag') is-error @enderror" type="text"
                        name="flag" id="flag" value="{{ old('flag') }}">
                    @error('flag')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="registry_port">
                        Registry port
                    </label>
                    <input class="form-control width-100% @error('registry_port') is-error @enderror" type="text"
                        name="registry_port" id="registry_port" value="{{ old('registry_port') }}">
                    @error('registry_port')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="gross_tonnage">
                        Gross tonnage
                    </label>
                    <input class="form-control width-100% @error('gross_tonnage') is-error @enderror" type="text"
                        name="gross_tonnage" id="gross_tonnage" value="{{ old('gross_tonnage') }}">
                    @error('gross_tonnage')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="call_sign">
                        Call sign
                    </label>
                    <input class="form-control width-100% @error('call_sign') is-error @enderror" type="text"
                        name="call_sign" id="call_sign" value="{{ old('call_sign') }}">
                    @error('call_sign')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="vessel_type">
                        Vessel type
                    </label>
                    <input class="form-control width-100% @error('vessel_type') is-error @enderror" type="text"
                        name="vessel_type" id="vessel_type" value="{{ old('vessel_type') }}">
                    @error('vessel_type')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="owner_details">
                        Owner details
                    </label>
                    <input class="form-control width-100% @error('owner_details') is-error @enderror" type="text"
                        name="owner_details" id="owner_details" value="{{ old('owner_details') }}">
                    @error('owner_details')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary">Create vessel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/choices.min.js') }}"></script>

    <script>
        const choices = new Choices('.js-choice');
    </script>

</x-layout>
