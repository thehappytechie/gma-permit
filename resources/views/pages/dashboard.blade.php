@section('title', 'Dashboard')

<x-layout>

    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Dashboard</h1>
    </div>
    <div class="grid gap-sm">
        <div class="alert-card bg radius-md padding-md shadow-xs col-12 js-alert-card">
            <div class="text-component line-height-lg">
                <p class="text-md flex flex-wrap items-center font-medium color-contrast-high">
                    👋 Hello, {{ Auth::user()->name }}
                </p>
            </div>
        </div>
        <div class="alert-card bg radius-md padding-md shadow-xs col-12 js-alert-card">
            <div class="grid grid-gap-md padding-x-md padding-y-md">
                <div class="col-6@sm col-3@md">
                    <div class="small-box bg-teal padding-top-sm">
                        <div class="inner">
                            <h3>{{ $contracts->active }}</h3>
                            <p>Active</p>
                        </div>
                        <div class="icon" aria-hidden="true">
                            <svg width="60" height="60" fill="currentColor" class="bi bi-bank"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 .95 14.61 4h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.379l.5 2A.5.5 0 0 1 15.5 17H.5a.5.5 0 0 1-.485-.621l.5-2A.5.5 0 0 1 1 14V7H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 4h.89L8 .95zM3.776 4h8.447L8 2.05 3.776 4zM2 7v7h1V7H2zm2 0v7h2.5V7H4zm3.5 0v7h1V7h-1zm2 0v7H12V7H9.5zM13 7v7h1V7h-1zm2-1V5H1v1h14zm-.39 9H1.39l-.25 1h13.72l-.25-1z" />
                            </svg>
                        </div>
                        <a href="#" class="small-box-footer">More Info
                            &#8594;</a>
                    </div>
                </div>
                <div class="col-6@sm col-3@md">
                    <div class="small-box bg-maroon padding-top-sm">
                        <div class="inner">
                            <h3>{{ $contracts->archived }}</h3>
                            <p>Archived</p>
                        </div>
                        <div class="icon" aria-hidden="true">
                            <svg width="60" height="60" fill="currentColor" class="bi bi-file-earmark-richtext"
                                viewBox="0 0 16 16">
                                <path
                                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                                <path
                                    d="M4.5 12.5A.5.5 0 0 1 5 12h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm0-2A.5.5 0 0 1 5 10h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zm1.639-3.708 1.33.886 1.854-1.855a.25.25 0 0 1 .289-.047l1.888.974V8.5a.5.5 0 0 1-.5.5H5a.5.5 0 0 1-.5-.5V8s1.54-1.274 1.639-1.208zM6.25 6a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5z" />
                            </svg>
                        </div>
                        <a href="#" class="small-box-footer">More Info
                            &#8594;</a>
                    </div>
                </div>
                <div class="col-6@sm col-3@md">
                    <div class="small-box bg-orange padding-top-sm">
                        <div class="inner">
                            <h3>{{ $contracts->draft }}</h3>
                            <p>Draft</p>
                        </div>
                        <div class="icon" aria-hidden="true">
                            <svg width="60" height="60" fill="currentColor" class="bi bi-file-earmark-excel"
                                viewBox="0 0 16 16">
                                <path
                                    d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z" />
                                <path
                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                            </svg>
                        </div>
                        <a href="#" class="small-box-footer">More Info &#8594;</a>
                    </div>
                </div>
                <div class="col-6@sm col-3@md">
                    <div class="small-box bg-purple padding-top-sm">
                        <div class="inner">
                            <h3>{{ $contracts->negotiating }}</h3>
                            <p>Negotiating</p>
                        </div>
                        <div class="icon" aria-hidden="true">
                            <svg width="60" height="60" fill="currentColor" class="bi bi-file-earmark-text"
                                viewBox="0 0 16 16">
                                <path
                                    d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                <path
                                    d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                            </svg>
                        </div>
                        <a href="#" class="small-box-footer">More Info &#8594;</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg radius-md padding-md shadow-xs col-8@sm col-8@xl">
            <h3 class="text-center margin-y-md">Company & Permits</h3>
            <div class="padding-x-md padding-y-lg">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="bg radius-md padding-md shadow-xs col-4@sm col-4@xl">
            <h3 class="text-center margin-y-md">Expiring Permits</h3>
            <div class="padding-md">
                <div class="margin-bottom-md">
                    <div class="flex items-baseline justify-between">
                        <p><a class="text-sm" href="#">View all &rarr;</a></p>
                    </div>
                </div>

                <div class="tbl text-sm">
                    <table class="tbl__table" aria-label="Table Example">
                        <thead class="tbl__header sr-only">
                            <tr class="tbl__row">
                                <th class="tbl__cell text-left" scope="col">
                                    <span class="text-xs text-uppercase letter-spacing-lg font-semibold">Label</span>
                                </th>

                                <th class="tbl__cell text-left" scope="col">
                                    <span
                                        class="text-xs text-uppercase letter-spacing-lg font-semibold">Category</span>
                                </th>

                                <th class="tbl__cell text-right" scope="col">
                                    <span
                                        class="text-xs text-uppercase letter-spacing-lg font-semibold">Progress</span>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="tbl__body">
                            @foreach ($expiringPermits as $expiringPermit)
                                <tr class="tbl__row">
                                    <td class="tbl__cell" role="cell">
                                        <p>{{ ucfirst($expiringPermit->title) }}</p>
                                        <p class="text-xs color-contrast-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                                fill="currentColor" class="margin-top-xs" viewBox="0 0 16 16">
                                                <path
                                                    d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                                                <path
                                                    d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                                                <path
                                                    d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                                            </svg>
                                            {{ Carbon::parse($expiringPermit->created_at)->diffForHumans() }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="bg radius padding-md">
            <h3 class="text-center margin-y-md">Recent Activity</h3>
            <div class="margin-x-md margin-y-sm margin-auto">
                <table class="table table--expanded@xs position-relative z-index-1 width-100% js-table text-sm"
                    aria-label="Table Example">
                    <thead class="table__header">
                        <tr class="table__row">
                            <th class="table__cell text-left" scope="col">Permit Title</th>
                            <th class="table__cell text-left" scope="col">User</th>
                            <th class="table__cell text-left" scope="col">Expiry</th>
                            <th class="table__cell text-left" scope="col">Status</th>
                            <th class="table__cell text-left" scope="col">Added</th>
                        </tr>
                    </thead>
                    <tbody class="table__body">
                        @foreach ($audits as $audit)
                            <tr class="table__row">
                                <td class="table__cell" role="cell">
                                    <span class="table__label" aria-hidden="true">Contract title:</span>
                                    {{ $audit->new_values['title'] }}
                                </td>
                                <td class="table__cell" role="cell">
                                    <span class="table__label" aria-hidden="true">User:</span>
                                    {{ $audit->user->name }}
                                </td>
                                <td class="table__cell" role="cell">
                                    <span class="table__label" aria-hidden="true">Expiry:</span>
                                    {{ Carbon\Carbon::parse($audit->new_values['expiry_date'])->toFormattedDateString() }}
                                </td>
                                <td class="table__cell" role="cell">
                                    <span class="table__label" aria-hidden="true">Status:</span>
                                    <span class="badge badge--primary-light text-xs">
                                        {{ $audit->new_values['status'] }} </span>
                                </td>
                                <td class="table__cell text-left" role="cell">
                                    <span class="table__label" aria-hidden="true">Added
                                        :</span>{{ $audit->created_at->diffForHumans() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>

<script src="{{ asset('js/chart.min.js') }}"></script>

<script>
    window.addEventListener('load', function() {
        Chart.defaults.font.family = "Inter";
        Chart.defaults.scale.ticks.display = false;
        Chart.defaults.plugins.legend.display = false;
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            responsive: true,
            maintainAspectRatio: false,
            type: 'line',
            options: {
                legend: {
                    display: false // remove legend
                },
                scales: {
                    x: {
                        grid: {
                            display: false // remove grid
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false // remove grid lines
                        },
                        ticks: {
                            display: true // remove y-axis numbers
                        }
                    },
                }
            },
            // The data for our dataset
            data: {
                labels: {!! $permitChart->pluck('company.name')->toJson() !!},
                display: false,
                datasets: [{
                    barPercentage: 0.5,
                    barThickness: 6,
                    maxBarThickness: 8,
                    minBarLength: 2,
                    label: 'total contracts',
                    backgroundColor: '#fff6e7',
                    fill: true,
                    borderWidth: 2,
                    borderColor: '#ffa500',
                    data: {!! $permitChart->pluck('company_id_count')->toJson() !!}
                }]
            },
        });
    })
</script>
