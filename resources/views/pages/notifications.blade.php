@section('title', 'Notifications')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Notifications</h2>
    </div>
    <div class="bg radius-md padding-md shadow-xs col-12">
        <div class="tbl">
            <table class="tbl__table text-sm border-bottom border-2" aria-label="Table Example">
                <thead class="tbl__header border-bottom border-2">
                    <tr class="tbl__row">
                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Company</span>
                        </th>

                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Permit</span>
                        </th>

                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Status</span>
                        </th>

                        <th class="tbl__cell text-left" scope="col">
                            <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Expiry date</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="tbl__body">
                    @foreach ($expiringPermits as $expiringPermit)
                        <tr class="tbl__row">
                            <td class="tbl__cell" role="cell">
                                <div class="flex items-center">
                                    <div class="line-height-xs">
                                        <p class="margin-bottom-xxxxs">{{ $expiringPermit->company->name }}</p>
                                        <p class="color-contrast-medium">{{ $expiringPermit->company->contact }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="tbl__cell" role="cell">{{ $expiringPermit->permitUnit->name }}</td>

                            <td class="tbl__cell" role="cell">{{ $expiringPermit->status }}</td>

                            <td class="tbl__cell" role="cell">
                                <span
                                    class="inline-block text-xs bg-error bg-opacity-20% color-error-darker radius-full padding-y-xxxs padding-x-xs ws-nowrap">
                                    {{ Carbon\Carbon::parse($expiringPermit->expiry_date)->diffForHumans() }}
                                </span>
                            </td>

                            <td class="tbl__cell text-right" role="cell">{{ $expiringPermit->title }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
