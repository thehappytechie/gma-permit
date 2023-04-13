@section('title', 'Companies')

<x-layout>
    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Permits</h1>
        <div class="flex justify-end">
            <a href="{{ route('permit.create') }}" class="btn btn--primary text-sm">Add Permit</a>
        </div>
    </div>

    <div class="grid gap-sm">
        <div class="bg radius-md padding-md shadow-xs col-12">
            <div class="int-table__inner text-sm margin-top-lg">
                <div class="grid">
                    <div class="col-6@md">
                        <p class="text-xs font-medium">FILTER BY ISSUE DATE</p>
                        <form method="get" id="search-form1" class="filter--form__search">
                            @csrf
                            <div class="grid gap-lg max-width-sm margin-y-xs color-contrast-medium">
                                <div class="col-3@md">
                                    <label class="form-label text-xs" for="date from">from:</label><br>
                                    <input class="form-control width-85%" type="date" name="issueFrom"
                                        id="issueFrom">
                                </div>
                                <div class="col-3@md">
                                    <label class="form-label" for="date to">to:</label><br>
                                    <input class="form-control width-85%" type="date" name="issueTo" id="issueTo">
                                </div>
                                <div class="col-4@md"><br>
                                    <button type="submit" id="search-form1" class="btn btn--subtle btn--icon"
                                        title="Filter"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="#808080" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                        </svg></button>
                                    <button type="reset" class="btn btn--icon" id="reset-form1" title="Clear"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#808080" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
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
                                <div class="col-3@md">
                                    <label class="form-label" for="date from">from:</label><br>
                                    <input class="form-control width-85%" type="date" name="expireFrom"
                                        id="expireFrom">
                                </div>
                                <div class="col-3@md">
                                    <label class="form-label" for="date to">to:</label><br>
                                    <input class="form-control width-85%" type="date" name="expireTo" id="expireTo">
                                </div>
                                <div class="col-4@md"><br>
                                    <button type="submit" class="btn btn--subtle btn--icon" title="Filter"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#808080" class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                        </svg></button>
                                    <button type="reset" class="btn btn--icon" id="reset-form2" title="Clear"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="#808080" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
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
                                    <span>Company name</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Vessel name</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Permit number</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Permit unit</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Permit type</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Issue date</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Expiry date</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Status</span>
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

</x-layout>

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
                    title: 'Certificates',
                    exportOptions: {
                        columns: ":visible",
                    },
                },
                {
                    extend: "pdf",
                    text: "PDF",
                    title: 'Permits',
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
            responsive: true,
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
