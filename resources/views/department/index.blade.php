@section('title', 'Departments')

<x-layout>
    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Departments</h2>
    </div>
    <div class="margin-bottom-md">
        @can('is-admin')
            <div class="flex justify-end">
                <a href="{{ route('department.create') }}" class="btn btn--primary text-sm">Add department</a>
            </div>
        @endcan
    </div>

    <div class="grid gap-sm margin-bottom-xl">
        <div class="bg radius-md padding-md shadow-xs col-12">
            <div class="int-table__inner text-sm">
                <table class="datatable int-table__table" aria-label="Datatable">
                    <thead class="int-table__header">
                        <tr class="int-table__row">
                            <th>
                                <div class="flex items-center">
                                    <span>Department name</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Location</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Manager</span>
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
            ajax: "{{ route('departmentDatatable') }}",
            columns: [{
                    data: "name",
                    name: "name"
                },
                {
                    data: "location",
                    name: "location"
                },
                {
                    data: "manager",
                    name: "manager"
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
