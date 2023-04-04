@section('title', 'Permissions')

<x-layout>

    <div class="margin-bottom-md">
        <h1 class="text-xl font-bold">Permissions</h1>
    </div>
    <div class="margin-bottom-md">
        <div class="flex justify-end">
            <a href="{{ route('permissions.create') }}" class="btn btn--primary text-sm">Add permission</a>
        </div>
    </div>

    <div class="grid gap-sm">
        <div class="bg radius-md padding-md shadow-xs col-12">
            <div class="int-table__inner text-sm">
                <table class="datatable int-table__table" aria-label="Datatable">
                    <thead class="int-table__header">
                        <tr class="int-table__row">
                            <th>
                                <div class="flex items-center">
                                    <span>Name</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Guard name</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Action</span>
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
        var table = $(".datatable").DataTable({
            dom: "Bfrtip",
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
                    extend: "colvis",
                    text: "Columns",
                },
                {
                    extend: "pageLength",
                    text: "Rows",
                },
            ],

            processing: true,
            select: true,
            mark: true,
            autoFill: true,
            responsive: true,
            ajax: "{{ route('permissionDatatable') }}",
            columns: [{
                    data: "name",
                    name: "name"
                },
                {
                    data: "guard_name",
                    name: "guard_name"
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
