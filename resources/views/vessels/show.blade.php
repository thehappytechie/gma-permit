@section('title', 'Show vessel')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">{{ $vessel->name }}</h2>
    </div>

    <div class="bg radius-md padding-lg shadow-xs col-12">
        <div class="tabs-v2 js-tabs padding-lg">
            <div class="margin-bottom-lg">
                <a href="{{ route('vesselDatatable') }}">&larr; Go to vessels</a>
            </div>
            <div class="user-cell margin-y-lg">
                <div class="user-cell__body margin-y-md margin-x-md">
                    <figure aria-hidden="true">
                        <img class="user-cell__img"
                            src="https://api.dicebear.com/6.x/shapes/svg?seed={{ $vessel->name }}"
                            alt="vessel profile image">
                    </figure>
                    <div class="user-cell__content text-component line-height-sm text-space-y-xxs">
                        <div class="grid col-span-2">
                            <div class="col-2@md">
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm font-medium">VESSEL NAME</p>
                                <p class="color-contrast-medium">{{ $vessel->name }}</p>
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm font-medium">GROSS TONNAGE</p>
                                <p class="color-contrast-medium">{{ $vessel->gross_tonnage }}</p>
                            </div>
                        </div>
                        <div class="grid col-span-2">
                            <div class="col-2@md">
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm font-medium">FLAG</p>
                                <p class="color-contrast-medium">{{ $vessel->flag }}</p>
                            </div>
                            <div class="col-5@md">
                                <p class="color-contrast-high text-sm font-medium">PORT OF REGISTRY</p>
                                <p class="color-contrast-medium">{{ $vessel->registry_port }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-cell__cta">
                    <a href="{{ route('vessels.edit', $vessel->id) }}" class="btn btn--primary btn--sm font-medium">Edit</a>
                </div>
            </div>
            <h2 class="text-md font-semibold padding-top-sm">CERTFICATE HISTORY</h2>
            <table class="tbl__table text-unit-em text-sm border-bottom border-2" aria-label="Table Example">
                <thead class="tbl__header border-bottom border-2">
                    <tr class="tbl__row">
                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs letter-spacing-lg font-semibold">Certificate
                                name</span>
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
                    @forelse ($vessel->certificates as $certificate)
                        <tr class="tbl__row text-sm">
                            <td class="tbl__cell" role="cell">
                                <div class="flex items-center">
                                    <div class="line-height-xs">
                                        <p class="margin-bottom-xxxxs">{{ $certificate->name }}</p>
                                    </div>
                                </div>
                            <td class="tbl__cell" role="cell">{{ $certificate->issue_date }}</td>

                            <td class="tbl__cell text-right" role="cell">{{ $certificate->expiry_date }}</td>
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
