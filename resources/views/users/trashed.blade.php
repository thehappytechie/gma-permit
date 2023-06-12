@section('title', 'Users')

<x-layout>

    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Trashed Users</h2>
        <div class="flex justify-end">
            <span class="padding-right-md padding-top-xs text-sm"> <a href="#" class="color-accent">Delete all</a></span>
            <a href="{{ route('users.restore.all') }}" class="btn btn--primary text-sm">Restore all</a>
        </div>
    </div>
    <div class="grid gap-sm margin-bottom-xl">
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
                                    <span>Email</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Role</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Deleted</span>
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
            ajax: "{{ route('trashedUserDatatable') }}",
            columns: [{
                    data: "name",
                    name: "users.name"
                },
                {
                    data: "email",
                    name: "users.email"
                },
                {
                    data: "role",
                    name: "role"
                },
                {
                    data: "deleted_at",
                    name: "deleted_at"
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
