@section('title', 'Edit company')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">{{ $company->name }}</h1>
    </div>

    <div class="bg radius-md shadow-xs">

        <div class="tabs-v2 js-tabs padding-lg">
            <nav>
                <div class="margin-bottom-lg">
                    <a href="{{ route('companyDatatable') }}">&larr; Go to companies</a>
                </div>

                <ul class="tabs-nav-v2 js-tabs__controls js-tabs-nav-v2" aria-label='Tabs Interface'>
                    <li><a href="#tab2Panel1" class="tabs-nav-v2__item js-tab-focus" aria-selected="true">EDIT</a></li>
                    <li><a href="#tab2Panel2" class="tabs-nav-v2__item js-tab-focus">PERMIT</a></li>
                </ul>
            </nav>

            <div class="js-tabs__panels">
                <section id="tab2Panel1" class="padding-top-md js-tabs__panel">
                    <div class="text-component">
                        <h2 class="text-lg font-bold padding-top-sm">Edit Company</h2>
                        <form action="{{ route('company.update', $company->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="grid gap-lg max-width-sm">
                                <small class="color-contrast-medium">
                                    <x-required-label></x-required-label>indicates a required field
                                </small>
                                <div class="col-12@md">
                                    <label class="form-label margin-bottom-xxs" for="name">
                                        <x-required-label></x-required-label>Company name
                                    </label>
                                    <input class="form-control width-100% @error('name') is-error @enderror"
                                        type="text" name="name" id="name" value="{{ $company->name }}"
                                        required>
                                    @error('name')
                                        <x-validation-error>{{ $message }}</x-validation-error>
                                    @enderror
                                </div>
                                <div class="col-12@md">
                                    <label class="form-label margin-bottom-xxs" for="address">
                                        Address
                                    </label>
                                    <input class="form-control width-100% @error('address') is-error @enderror"
                                        type="text" name="address" id="address" value="{{ $company->address }}">
                                    @error('address')
                                        <x-validation-error>{{ $message }}</x-validation-error>
                                    @enderror
                                </div>
                                <div class="col-6@md">
                                    <label class="form-label margin-bottom-xxs" for="email">
                                        Email
                                    </label>
                                    <input class="form-control width-100% @error('email') is-error @enderror"
                                        type="email" name="email" id="email" value="{{ $company->email }}">
                                    @error('email')
                                        <x-validation-error>{{ $message }}</x-validation-error>
                                    @enderror
                                </div>
                                <div class="col-6@md">
                                    <label class="form-label margin-bottom-xxs" for="contact">
                                        Contact
                                    </label>
                                    <input class="form-control width-100% @error('contact') is-error @enderror"
                                        type="text" name="contact" id="contact" value="{{ $company->contact }}">
                                    @error('contact')
                                        <x-validation-error>{{ $message }}</x-validation-error>
                                    @enderror
                                </div>
                                <div class="col-6@md">
                                    <label class="form-label margin-bottom-xxs" for="registry_port">
                                        Registry port
                                    </label>
                                    <input class="form-control width-100% @error('registry_port') is-error @enderror"
                                        type="text" name="registry_port" id="registry_port"
                                        value="{{ $company->registry_port }}">
                                    @error('registry_port')
                                        <x-validation-error>{{ $message }}</x-validation-error>
                                    @enderror
                                </div>
                                <div class="col-6@md">
                                    <label class="form-label margin-bottom-xxs" for="gross_tonnage">
                                        Gross tonnage
                                    </label>
                                    <input class="form-control width-100% @error('gross_tonnage') is-error @enderror"
                                        type="number" name="gross_tonnage" id="gross_tonnage"
                                        value="{{ $company->gross_tonnage }}">
                                    @error('gross_tonnage')
                                        <x-validation-error>{{ $message }}</x-validation-error>
                                    @enderror
                                </div>
                                <div class="col-4@md">
                                    <label class="form-label margin-bottom-xxs" for="call_sign">
                                        Call sign
                                    </label>
                                    <input class="form-control width-100% @error('call_sign') is-error @enderror"
                                        type="number" name="call_sign" id="call_sign"
                                        value="{{ $company->call_sign }}">
                                    @error('call_sign')
                                        <x-validation-error>{{ $message }}</x-validation-error>
                                    @enderror
                                </div>
                                <div class="col-4@md">
                                    <label class="form-label margin-bottom-xxs" for="vessel_number">
                                        Vessel number
                                    </label>
                                    <input class="form-control width-100% @error('vessel_number') is-error @enderror"
                                        type="text" name="vessel_number" id="vessel_number"
                                        value="{{ $company->vessel_number }}">
                                    @error('vessel_number')
                                        <x-validation-error>{{ $message }}</x-validation-error>
                                    @enderror
                                </div>
                                <div class="col-4@md">
                                    <label class="form-label margin-bottom-xxs" for="imo_number">
                                        IMO number
                                    </label>
                                    <input class="form-control width-100% @error('imo_number') is-error @enderror"
                                        type="text" name="imo_number" id="imo_number"
                                        value="{{ $company->imo_number }}">
                                    @error('imo_number')
                                        <x-validation-error>{{ $message }}</x-validation-error>
                                    @enderror
                                </div>
                                <div class="border-top border-contrast-lower text-right">
                                    <div class="margin-top-sm">
                                        <button class="btn btn--primary btn--md">Update company</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>

                <section id="tab2Panel2" class="padding-top-md js-tabs__panel">
                    <div class="text-component">
                        <h2 class="text-lg font-bold padding-top-sm">Permit History</h2>
                        <table class="tbl__table text-unit-em text-sm border-bottom border-2"
                            aria-label="Table Example">
                            <thead class="tbl__header border-bottom border-2">
                                <tr class="tbl__row">
                                    <th class="tbl__cell text-left" scope="col">
                                        <span
                                            class="text-xs text-uppercase letter-spacing-lg font-semibold">Vessel name</span>
                                    </th>

                                    <th class="tbl__cell text-left" scope="col">
                                        <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Job</span>
                                    </th>

                                    <th class="tbl__cell text-left" scope="col">
                                        <span
                                            class="text-xs text-uppercase letter-spacing-lg font-semibold">Country</span>
                                    </th>

                                    <th class="tbl__cell text-left" scope="col">
                                        <span
                                            class="text-xs text-uppercase letter-spacing-lg font-semibold">Status</span>
                                    </th>

                                    <th class="tbl__cell text-right" scope="col">
                                        <span
                                            class="text-xs text-uppercase letter-spacing-lg font-semibold">Salary</span>
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="tbl__body">
                                @foreach ($permits as $permit)
                                    <tr class="tbl__row">
                                        <td class="tbl__cell" role="cell">
                                            <div class="flex items-center">
                                                <div class="line-height-xs">
                                                    <p class="margin-bottom-xxxxs">{{ $permit->vessel_name }}</p>
                                                    <p class="color-contrast-medium">{{ $permit->permit_number }}</p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="tbl__cell" role="cell">Senior Data Engineer</td>

                                        <td class="tbl__cell" role="cell">USA</td>

                                        <td class="tbl__cell" role="cell">
                                            <span
                                                class="inline-block text-sm bg-success bg-opacity-20% color-success-darker radius-full padding-y-xxxs padding-x-xs ws-nowrap">Online</span>
                                        </td>

                                        <td class="tbl__cell text-right" role="cell">$320,000</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>

</x-layout>
