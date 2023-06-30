@section('title', 'My activity')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Logs</h2>
    </div>
    <div class="grid gap-sm margin-bottom-xl">
        <div class="bg radius-md padding-md shadow-xs col-12">
            <div class="margin-y-md margin-x-md">
                <div class="grid gap-lg margin-right-lg">
                    <a href="{{ route('security') }}">&larr; Account security</a>
                    <p class="color-contrast-medium">A history of security-related activity on your account.
                        Logging in or
                        out.</p>
                </div>
                <div class="tbl margin-y-lg">
                    <table class="tbl__table text-unit-em text-sm border-bottom border-2" aria-label="table">
                        <thead class="tbl__header border-bottom border-2">
                            <tr class="tbl__row">
                                <th class="tbl__cell text-left" scope="col" style="width:70%">
                                    <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Browser</span>
                                </th>
                                <th class="tbl__cell text-left" scope="col">
                                    <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Ip
                                        addesss</span>
                                </th>
                                <th class="tbl__cell text-left" scope="col">
                                    <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Time</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="tbl__body">
                            @foreach ($activities as $activity)
                                <tr class="tbl__row" style="font-size: 14px">
                                    <td class="tbl__cell" role="cell"> {{ $activity->user_agent }}</td>
                                    <td class="tbl__cell" role="cell"> {{ $activity->ip_address }}</td>
                                    <td class="tbl__cell" role="cell">
                                        {{ \Carbon\Carbon::parse($activity->login_at)->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-layout>
