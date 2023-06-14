@section('title', 'Locations')

<x-layout>

    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Locations</h2>
    </div>
    <div class="margin-bottom-md">
        @can('is-admin')
            <div class="flex justify-end">
                <a href="{{ route('location.create') }}" class="btn btn--primary text-sm">Add location</a>
            </div>
        @endcan
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
                                    <span class="font-medium color-contrast-higher">Location name</span>
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
            responsive: true,
            fixedHeader: true,
            serverSide: true,
            ajax: "{{ route('locationDatatable') }}",
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
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false
                },
            ],
        });
    });
</script>
