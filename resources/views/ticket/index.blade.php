@section('title', 'Tickets')

<x-layout>

    <div class="margin-bottom-md">
        <h2 class="text-xl font-semibold">Tickets</h2>
        <div class="flex justify-end">
            <a href="{{ route('ticket.create') }}" class="btn btn--primary text-sm">Create new</a>
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
                                    <span>Title</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Created by</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Category</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Status</span>
                                </div>
                            </th>
                            <th>
                                <div class="flex items-center">
                                    <span>Created</span>
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
                    exportOptions: {
                        modifier: {
                            page: "current",
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
            serverSide: true,
            select: true,
            mark: true,
            autoFill: true,
            responsive: true,
            ajax: "{{ route('ticketDatatable') }}",
            columns: [{
                    data: "title",
                    name: "title"
                },
                {
                    data: "user",
                    name: "user"
                },
                {
                    data: "category",
                    name: "category"
                },
                {
                    data: "status",
                    name: "status"
                },
                {
                    data: "created_at",
                    name: "created_at"
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
