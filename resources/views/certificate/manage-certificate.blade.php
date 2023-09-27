@section('title', 'Certificates')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Manage Certificates</h2>
        <div class="flex justify-end">
            <a href="{{ route('certificate.create') }}" class="btn btn--primary text-sm">Add Certificate</a>
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
                                    <span class="font-medium color-contrast-higher">Certificate name</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span class="font-medium color-contrast-higher">Vessel name</span>
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
                                    <span class="font-medium color-contrast-higher">Action</span>
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
            scrollY: 400,
            responsive: true,
            fixedHeader: true,
            ajax: {
                url: '{{ route('editCertificateDatatable') }}',
                type: 'GET',
            },
            columns: [{
                    data: "checkbox",
                    name: "checkbox",
                    orderable: false,
                    searchable: false
                }, {
                    data: "name",
                    name: "name"
                },
                {
                    data: "vessel.name",
                    name: "vessel.name"
                }, {
                    data: "issue_date",
                    name: "issue_date"
                },
                {
                    data: "expiry_date",
                    name: "expiry_date"
                },
                {
                    data: "status",
                    name: "status",
                },
            ],
        });
    });
</script>
