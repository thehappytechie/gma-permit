<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/font/inter.css') }}" rel="stylesheet">
    <link id="codyframe" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pace-theme-default.min.css') }}">
    <title>@yield('title')</title>
    <link href="{{ asset('css/filepond.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/choices.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select-dropdown.css') }}" />
    <link href="{{ asset('css/tom-select.css') }}" rel="stylesheet">

    @livewireStyles

</head>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body>

    <div>
        <div class="grid gap-sm margin-bottom-xl">
            <div class="padding-md col-12">
                <h2 class="text-xxl font-bold">Permits</h2>
                <div class="int-table__inner text-sm margin-top-md">
                    <div class="grid mt-8">
                        <div class="col-6@md">
                            <p class="text-xs font-medium">FILTER BY ISSUE DATE</p>
                            <form method="get" id="search-form1" class="filter--form__search">
                                @csrf
                                <div class="grid gap-lg max-width-sm margin-y-xs color-contrast-medium">
                                    <div class="col-3@md margin-right-xs">
                                        <label class="form-label text-xs" for="date from">from:</label><br>
                                        <input class="form-control width-85%" type="date" name="issueFrom"
                                            id="issueFrom">
                                    </div>
                                    <div class="col-3@md margin-right-xs">
                                        <label class="form-label" for="date to">to:</label><br>
                                        <input class="form-control width-85%" type="date" name="issueTo"
                                            id="issueTo">
                                    </div>
                                    <div class="col-4@md"><br>
                                        <button type="submit" id="search-form1" class="btn btn--subtle btn--icon"
                                            title="Filter"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="#808080" class="bi bi-funnel-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                            </svg></button>
                                        <button type="reset" class="btn btn--icon" id="reset-form1"
                                            title="Clear"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="#808080" class="bi bi-x-circle-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-6@md">
                            <p class="text-xs font-medium">FILTER BY EXPIRY DATE</p>
                            <form method="get" id="search-form2" class="filter--form__search">
                                @csrf
                                <div class="color-contrast-medium grid gap-lg max-width-sm margin-y-xs">
                                    <div class="col-3@md margin-right-xs">
                                        <label class="form-label" for="date from">from:</label><br>
                                        <input class="form-control width-85%" type="date" name="expireFrom"
                                            id="expireFrom">
                                    </div>
                                    <div class="col-3@md margin-right-xs">
                                        <label class="form-label" for="date to">to:</label><br>
                                        <input class="form-control width-85%" type="date" name="expireTo"
                                            id="expireTo">
                                    </div>
                                    <div class="col-4@md"><br>
                                        <button type="submit" class="btn btn--subtle btn--icon" title="Filter"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="#808080" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                            </svg></button>
                                        <button type="reset" class="btn btn--icon" id="reset-form2"
                                            title="Clear"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" fill="#808080" class="bi bi-x-circle-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="datatable int-table__table" aria-label="Datatable">
                        <thead class="int-table__header">
                            <tr class="int-table__row">
                                <th></th>
                                <th>
                                    <div class="flex items-center">
                                        <span class="font-medium color-contrast-higher">Company name</span>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <span class="font-medium color-contrast-higher">Vessel name</span>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <span class="font-medium color-contrast-higher">Permit number</span>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <span class="font-medium color-contrast-higher">Permit unit</span>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <span class="font-medium color-contrast-higher">Permit type</span>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <span class="font-medium color-contrast-higher">Issue date</span>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <span class="font-medium color-contrast-higher">Expiry date</span>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <span class="font-medium color-contrast-higher">Created at</span>
                                    </div>
                                </th>
                                <th>
                                    <div class="flex items-center">
                                        <span class="font-medium color-contrast-higher">Status</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @livewireScripts

    <script src="{{ asset('js/alpine.min.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/components-script.js') }}"></script>
    <script src="{{ asset('js/filepond.js') }}"></script>

</body>

</html>


<x-datatable />

<script type="text/javascript">
    $(function() {
        let oTable = $(".datatable").DataTable({
            dom: "Bfrtip",
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            select: {
                style: 'multi',
                selector: 'td:first-child'
            },
            order: [
                [1, 'asc']
            ],
            lengthMenu: [
                [10, 25, 50, -1],
                ["10 rows", "25 rows", "50 rows", "Show all"],
            ],
            buttons: [{
                    extend: "excel",
                    text: "Excel",
                    exportOptions: {
                        columns: ":visible",
                    },
                },
                {
                    extend: "pdf",
                    text: "PDF",
                    orientation: 'landscape',
                    exportOptions: {
                        modifier: {
                            page: "all",
                        },
                    },
                },
                {
                    text: 'Reload table',
                    action: function() {
                        oTable.ajax.reload();
                    }
                },
                {
                    extend: "colvis",
                    text: "Columns",
                },
                {
                    extend: "pageLength",
                    text: "Rows",
                },
            ],
            processing: true,
            mark: true,
            autoFill: true,
            scrollY: 500,
            responsive: true,
            fixedHeader: true,
            ajax: {
                url: '{{ route('permitDatatable') }}',
                type: 'GET',
                data: function(d) {
                    d.issueFrom = $('input[name=issueFrom]').val();
                    d.issueTo = $('input[name=issueTo]').val();
                    d.expireFrom = $('input[name=expireFrom]').val();
                    d.expireTo = $('input[name=expireTo]').val();
                }
            },
            columns: [{
                    data: "checkbox",
                    name: "checkbox",
                    orderable: false,
                    searchable: false
                }, {
                    data: "company.name",
                    name: "company.name"
                },
                {
                    data: "vessel_name",
                    name: "vessel_name"
                },
                {
                    data: "permit_number",
                    name: "permit_number"
                },
                {
                    data: "permit_unit.name",
                    name: "permit_unit.name"
                },
                {
                    data: "permit_type",
                    name: "permit_type"
                },
                {
                    data: "issue_date",
                    name: "issue_date"
                },
                {
                    data: "expiry_date",
                    name: "expiry_date"
                },
                {
                    data: "created_at",
                    name: "created_at"
                },
                {
                    data: "status",
                    name: "status"
                },
            ],
        });
        $('#search-form1').on('submit', function(e) {
            e.preventDefault()
            oTable.ajax.reload();
        });
        $('#reset-form1').on('click', function() {
            setTimeout(() => {
                oTable.ajax.reload();
            }, 300);
        })
        $('#search-form2').on('submit', function(e) {
            e.preventDefault()
            oTable.ajax.reload();
        });
        $('#reset-form2').on('click', function() {
            setTimeout(() => {
                oTable.ajax.reload();
            }, 300);
        })
    });
</script>