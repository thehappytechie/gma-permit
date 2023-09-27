@section('title', 'Permits')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Manage Permits</h2>
        <div class="flex justify-end">
            <a href="{{ route('permit.create') }}" class="btn btn--primary text-sm">Add Permit</a>
        </div>
    </div>

    <div class="grid gap-sm margin-bottom-xl">
        <div class="bg radius-md padding-md shadow-xs col-12">
            <div class="int-table__inner text-sm">
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
            scrollY: 400,
            responsive: true,
            fixedHeader: true,
            ajax: {
                url: '{{ route('editPermitDatatable') }}',
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
