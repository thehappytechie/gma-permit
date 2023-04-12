@section('title', 'Show company')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">{{ $company->name }}</h1>
    </div>

    <div class="bg radius-md shadow-xs">

        <div class="tabs-v2 js-tabs padding-lg">
            <div class="margin-bottom-lg">
                <a href="{{ route('companyDatatable') }}">&larr; Go to companies</a>
            </div>
            <div class="user-cell margin-y-lg">
                <div class="user-cell__body margin-y-sm">
                    <figure aria-hidden="true">
                        <img class="user-cell__img" src="https://api.dicebear.com/6.x/shapes/svg?seed={{ $company->name }}"
                            alt="Company profile image">
                    </figure>
                    <div class="user-cell__content text-component line-height-sm text-space-y-xxs">
                        <div class="grid col-span-2">
                            <div class="col-2@md">
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm"><strong>COMPANY NAME</strong></p>
                                <p class="color-contrast-medium">{{ $company->name }}</p>
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm"><strong>GROSS TONNAGE</strong></p>
                                <p class="color-contrast-medium">{{ $company->gross_tonnage }}</p>
                            </div>
                        </div>
                        <div class="grid col-span-2">
                            <div class="col-2@md">
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm"><strong>CONTACT & EMAIL</strong></p>
                                <p class="color-contrast-medium">{{ $company->email }} <br> {{ $company->contact }}</p>
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm"><strong>CALL SIGN</strong></p>
                                <p class="color-contrast-medium">{{ $company->call_sign }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-cell__cta">
                    <a href="{{ route('company.edit', $company->id) }}" class="btn btn--primary btn--sm">Edit
                        company</a>
                </div>
            </div>
            <h2 class="text-md font-bold padding-top-sm">PERMIT HISTORY</h2>
            <table class="tbl__table text-unit-em text-sm border-bottom border-2" aria-label="Table Example">
                <thead class="tbl__header border-bottom border-2">
                    <tr class="tbl__row">
                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Vessel
                                name</span>
                        </th>

                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Permit unit</span>
                        </th>

                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Gross tonnage</span>
                        </th>

                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Permit type</span>
                        </th>

                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Issue date</span>
                        </th>
                        <th class="tbl__cell text-right" scope="col">
                            <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Expiry date</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="tbl__body">
                    @foreach ($company->permits as $permit)
                        <tr class="tbl__row text-sm">
                            <td class="tbl__cell" role="cell">
                                <div class="flex items-center">
                                    <div class="line-height-xs">
                                        <p class="margin-bottom-xxxxs">{{ $permit->vessel_name }}</p>
                                        <p class="color-contrast-medium">{{ $permit->permit_number }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="tbl__cell" role="cell">{{ $permit->permitUnit->name }}</td>

                            <td class="tbl__cell" role="cell">{{ $permit->gross_tonnage }}</td>

                            <td class="tbl__cell" role="cell">
                                <span
                                    class="inline-block text-sm bg-success bg-opacity-20% color-success-darker radius-full padding-y-xxxs padding-x-xs ws-nowrap">{{ $permit->permit_type }}</span>
                            </td>
                            <td class="tbl__cell" role="cell">{{ $permit->issue_date }}</td>

                            <td class="tbl__cell text-right" role="cell">{{ $permit->expiry_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-layout>
