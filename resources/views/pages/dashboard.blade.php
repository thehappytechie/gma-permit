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
                            <h3>{{ $permits->total }}</h3>
                            <p>Permits</p>
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
                            <h3>{{ $certificates->total }}</h3>
                            <p>Certificates</p>
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
                            <h3>{{ $permits->safety }}</h3>
                            <p>Safety Permits</p>
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
                            <h3>{{ $permits->operating }}</h3>
                            <p>Operating Permits</p>
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

        <div class="bg radius-md padding-md shadow-xs col-6@sm col-6@xl">
            <h3 class="text-center margin-y-md">Company & Permits</h3>
            <div class="padding-x-md padding-y-lg">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="bg radius-md padding-md shadow-xs col-6@sm col-6@xl">
            <h3 class="text-center margin-y-md">Vessels & Certificates</h3>
            <div class="padding-x-md padding-y-lg">
                <canvas id="myChart2"></canvas>
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
                    label: ' total permits',
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

<script>
    window.addEventListener('load', function() {
        Chart.defaults.font.family = "Inter";
        Chart.defaults.scale.ticks.display = false;
        Chart.defaults.plugins.legend.display = false;
        var ctx = document.getElementById('myChart2').getContext('2d');
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
                labels: {!! $certificateChart->pluck('vessel.name')->toJson() !!},
                display: false,
                datasets: [{
                    barPercentage: 0.5,
                    barThickness: 6,
                    maxBarThickness: 8,
                    minBarLength: 2,
                    label: ' total certificates',
                    backgroundColor: '#fff6e7',
                    fill: true,
                    borderWidth: 2,
                    borderColor: '#ffa500',
                    data: {!! $certificateChart->pluck('vessel_id_count')->toJson() !!}
                }]
            },
        });
    })
</script>
