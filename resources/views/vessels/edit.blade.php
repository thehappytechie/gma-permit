@section('title', 'Edit vessel')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Edit - {{ ucwords(strtolower($vessel->name)) }}</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs margin-bottom-xl">
        <form action="{{ route('vessels.update', $vessel->id) }}" method="post">
            @csrf
            @method('put')
            <div class="grid gap-lg max-width-sm">
                <a href="{{ route('vesselDatatable') }}">&larr; Go to vessels</a>
                <small class="color-contrast-medium">
                    <x-required-label></x-required-label>indicates a required field
                </small>
                <div class="col-12@md">
                    <label class="form-label margin-bottom-xxs" for="name">
                        <x-required-label></x-required-label> Vessel name
                    </label>
                    <input class="form-control width-100% @error('name') is-error @enderror" type="text"
                        name="name" id="name" value="{{ $vessel->name }}" required>
                    @error('name')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="vessel_type">
                        Vessel type
                    </label>
                    <input class="form-control width-100% @error('vessel_type') is-error @enderror" type="text"
                        name="vessel_type" id="vessel_type" value="{{  $vessel->vessel_type }}">
                    @error('vessel_type')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="flag">
                        Flag
                    </label>
                    <input class="form-control width-100% @error('flag') is-error @enderror" type="text"
                        name="flag" id="flag" value="{{ $vessel->flag }}">
                    @error('flag')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="registry_port">
                        Registry port
                    </label>
                    <input class="form-control width-100% @error('registry_port') is-error @enderror" type="text"
                        name="registry_port" id="registry_port" value="{{ $vessel->registry_port }}">
                    @error('registry_port')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="gross_tonnage">
                        Gross tonnage
                    </label>
                    <input class="form-control width-100% @error('gross_tonnage') is-error @enderror" type="number"
                        name="gross_tonnage" id="gross_tonnage" value="{{ $vessel->gross_tonnage }}">
                    @error('gross_tonnage')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="call_sign">
                        Call sign
                    </label>
                    <input class="form-control width-100% @error('call_sign') is-error @enderror" type="number"
                        name="call_sign" id="call_sign" value="{{ $vessel->call_sign }}">
                    @error('call_sign')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="col-6@md">
                    <label class="form-label margin-bottom-xxs" for="owner_details">
                        Owner details
                    </label>
                    <input class="form-control width-100% @error('owner_details') is-error @enderror" type="text"
                        name="owner_details" id="owner_details" value="{{ $vessel->owner_details }}">
                    @error('owner_details')
                        <x-validation-error>{{ $message }}</x-validation-error>
                    @enderror
                </div>
                <div class="border-top border-contrast-lower text-right">
                    <div class="margin-top-sm">
                        <button class="btn btn--primary btn--md font-medium">Update vessel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-layout>
