@section('title', 'Show company')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">{{ ucwords(strtolower($company->name)) }}</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs col-12">
        <div class="tabs-v2 js-tabs">
            <div class="margin-bottom-lg">
                <a href="{{ route('companyDatatable') }}">&larr; Go to companies</a>
            </div>
            <div class="user-cell margin-y-lg">
                <div class="user-cell__body margin-y-md margin-x-md">
                    <figure aria-hidden="true">
                        <img class="user-cell__img"
                            src="https://api.dicebear.com/6.x/shapes/svg?seed={{ $company->name }}"
                            alt="Company profile image">
                    </figure>
                    <div class="user-cell__content text-component line-height-sm text-space-y-xxs">
                        <div class="grid col-span-2">
                            <div class="col-2@md">
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm font-medium">VESSEL NUMBER</p>
                                <p class="color-contrast-medium">{{ $company->vessel_number ?? 'No data' }}</p>
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm font-medium">GROSS TONNAGE</p>
                                <p class="color-contrast-medium">{{ $company->gross_tonnage ?? 'No data' }}</p>
                            </div>
                        </div>
                        <div class="grid col-span-2 margin-top-sm">
                            <div class="col-2@md">
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm font-medium">CONTACT & EMAIL</p>
                                <p class="color-contrast-medium">{{ $company->email ?? 'No data' }} <br>
                                    {{ $company->contact }}</p>
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm font-medium">CALL SIGN</p>
                                <p class="color-contrast-medium">{{ $company->call_sign ?? 'No data' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-cell__cta">
                    <a href="{{ route('company.edit', $company->id) }}" class="btn btn--primary btn--sm">Edit company
                    </a>
                </div>
            </div>
            <h2 class="text-md font-semibold padding-top-md">Permit History</h2>
            <table class="tbl__table text-unit-em text-sm border-bottom border-2" aria-label="Table Example">
                <thead class="tbl__header border-bottom border-2">
                    <tr class="tbl__row">
                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs letter-spacing-lg font-semibold">Permit number</span>
                        </th>

                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs letter-spacing-lg font-semibold">Permit unit</span>
                        </th>

                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs letter-spacing-lg font-semibold">Permit type</span>
                        </th>

                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs letter-spacing-lg font-semibold">Issue date</span>
                        </th>
                        <th class="tbl__cell text-right" scope="col">
                            <span class="text-xs letter-spacing-lg font-semibold">Expiry date</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="tbl__body">
                    @forelse ($company->permits as $permit)
                        <tr class="tbl__row text-sm">
                            <td class="tbl__cell" role="cell">
                                <div class="flex items-center">
                                    <div class="line-height-xs">
                                        <p class="color-contrast-medium">{{ $permit->permit_number }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="tbl__cell" role="cell">{{ $permit->permitUnit->name }}</td>

                            <td class="tbl__cell" role="cell">
                                <span
                                    class="inline-block text-sm bg-success bg-opacity-20% color-success-darker radius-full padding-y-xxxs padding-x-xs ws-nowrap">{{ $permit->permit_type }}</span>
                            </td>
                            <td class="tbl__cell" role="cell">{{ $permit->issue_date }}</td>

                            <td class="tbl__cell text-right" role="cell">{{ $permit->expiry_date }}</td>
                        </tr>
                    @empty
                        <tr class="tbl__row text-sm">
                            <td class="tbl__cell text-center" role="cell">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-layout>
